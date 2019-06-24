<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Environment;
use App\Project;
use App\Report;
use App\Day;

use Auth;

class ReportController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        //
    }

    public function create(Environment $environment)
    {
        $projects = Project::where('environment_id', $environment->id)->orderBy('title', 'desc')->get();

        $user = Auth::User();

        Report::where('active', false)->where('user_id', $user->id)->delete();

        $report = Report::create([
            'environment_id' =>  $environment->id,
            'user_id' => $user->id
        ]);

        return view('reports.create')
        ->with(compact('environment'))
        ->with(compact('projects'))
        ->with(compact('report'));
    }

    public function store(Environment $environment, Request $request)
    {
        $report = Report::find ($request->report_id);

        if(!empty($report)){

            if($report->days->count() > 0){
                $report->initial_date = date('Y/m/d', strtotime($request->date));
                $report->active = true;
                $report->save();
            }

            return redirect('environment/'.$report->environment->id);

        }

        return redirect('home');
    }

    public function show(Report $report)
    {

    }

    public function edit(Report $report)
    {
        //
    }

    public function update(Request $request, Report $report)
    {
        //
    }

    public function destroy(Report $report)
    {
        //
    }



    public function add (Request $request)
    {

        $this->validate($request ,[
            'title' => ['required', 'max:25'],
            'description' => ['required', 'max:100'],
            //'code' => ['required', 'max:10'],
            //'initial_date' => ['required', 'date', 'date_format:d-m-Y']
        ]);

        $date = strtotime($request->initial_date);

        $user = Auth::User();
        $project = Project::create([
            'title' => $request->title,
            'description' => $request->description,
            'code' => $request->code,
            'initial_date' => date('Y/m/d', $date),
            'environment_id' => $request->environment_id
        ]);

        return response()->json([
            'project' => $project,
            'url' => $project->url,
        ]);
    }

    public function change (Request $request){
        $project = Project::find ($request->id);

        $environment = $project->environment;

        $date = strtotime($request->initial_date);

        $project->title = $request->title;
        $project->description = $request->description;
        $project->code = $request->code;
        $project->initial_date = date('Y/m/d', $date);
        $project->save();
        return response()->json([
            'project' => $project,
            'url' => $project->url,
        ]);
      }

      public function delete(Request $request){
        $project = Project::find ($request->id)->delete();
        return response()->json();
      }


}
