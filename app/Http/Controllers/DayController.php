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
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $initial_date = strtotime($request->initial_date);
        $index = $request->index;

        $date = Carbon::parse($initial_date)->startOfWeek();
        $index_date = $date->copy()->add( $index, 'day');

        if(Auth::check())
        {
            $day = Day::create([
                'date' => date('Y/m/d', strtotime($index_date)),
                'hours' => $request->hours,
                'report_id' => $request->report_id,
                'project_id' => $request->project_id,
            ]);

            $project = Project::find($day->project_id);

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

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
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










        $initial_date = strtotime($request->initial_date);
        $index = $request->index;

        $date = Carbon::parse($initial_date)->startOfWeek();
        $index_date = $date->copy()->add( $index, 'day');

        if(Auth::check())
        {
            $day = Day::create([
                'date' => date('Y/m/d', strtotime($index_date)),
                'hours' => $request->hours,
                'report_id' => $request->report_id,
                'project_id' => $request->project_id,
            ]);

            $project = Project::find($day->project_id);

            return response()->json([
                'day' => $day,
                'index' => $index,
                'project' => $project,
            ]);
        }




    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        $day = Day::find ($request->id);
        $dayBuffer = $day;
        $day->delete();
        return response()->json([
            'day' => $dayBuffer,
        ]);
    }

}
