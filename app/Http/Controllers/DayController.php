<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Carbon\Carbon;

use App\Environment;
use App\Project;
use App\Report;
use App\User;
use App\Salary;
use App\Day;

use Auth;

class DayController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        //
    }

    public function create()
    {
        //
    }

    public function store(Request $request)
    {
        $initial_date = strtotime($request->initial_date);
        $index = $request->index;

        $date = Carbon::parse($initial_date)->startOfWeek();
        $index_date = $date->copy()->add( $index, 'day');

        if(Auth::check())
        {
            if (($request->hours > 0) && ($request->project_id > 0))
            {

                $day = Day::create([
                    'date' => date('Y/m/d', strtotime($index_date)),
                    'hours' => $request->hours,
                    'report_id' => $request->report_id,
                    'project_id' => $request->project_id,
                ]);

                $project = Project::find($day->project_id);

            }

            return response()->json([
                'day' => $day,
                'index' => $index,
                'project' => $project,
            ]);
        }
        else{
            return redirect('login');
        }

    }

    public function show($id)
    {
        //
    }

    public function edit($id)
    {
        //
    }

    public function update(Request $request)
    {
        $initial_date = strtotime($request->initial_date);
        $index = $request->index;

        $date = Carbon::parse($initial_date)->startOfWeek();
        $index_date = $date->copy()->add( $index, 'day');

        $day = Day::find ($request->id);

        $day->date = date('Y/m/d', strtotime($index_date));
        $day->project_id = $request->project_id;
        $day->hours = $request->hours;
        $day->save();

        $project = $day->project;

        return response()->json([
            'day' => $day,
            'index' => $index,
            'project' => $project,
        ]);
    }

    public function destroy(Request $request)
    {
        $day = Day::find ($request->id);
        $dayBuffer = $day;
        $day->delete();
        return response()->json([
            'day' => $dayBuffer,
        ]);
    }

    public function select(Request $request)
    {
        return response()->json([
            'day' => '1',
        ]);
    }

}
