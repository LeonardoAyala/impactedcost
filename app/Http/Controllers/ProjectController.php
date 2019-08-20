<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Str;

use Validator;
use Response;
use Illuminate\Support\Facades\Input;

use App\Environment;
use App\Project;
use App\Report;
use App\User;
use App\Salary;
use App\ProjectCategory;
use App\Productivity;

use Auth;


class ProjectController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    //Axios consumable
    public function index($id)
    {
        $environment = Environment::find($id);

        $projects = $environment->projects()->orderBy('created_at', 'desc')->get();

        return response()->json($projects);
    }

    public function create(Environment $environment)
    {
        return view('projects.create', compact('environment'));
    }

    public function store(Environment $environment, Request $request)
    {

        $validation = $this->validate($request ,[
            'title' => ['required', 'max:25'],
            'description' => ['max:100'],
            'code' => ['max:20'],
        ]);

        if($request->validation){
            if(isset($validation)){
                return response()->json([
                    'message' => 'good',
                ]);
            }
        }

        /*
        $rules = [
            'start_at'      => 'required|date|date_format:Y-m-d|after:yesterday',
            'end_at'        => 'required|date|date_format:Y-m-d|after:xxxx',
        ];
        */


        $date = strtotime($request->initial_date);

        $project = Project::create([
            'code' => $request->code,
            'title' => $request->title,
            'project_category_id' => '1',
            'description' => $request->description,
            'initial_date' => date('Y/m/d', $date),
            'environment_id' => $environment->id,
            'expected_budget' => $request->expected_budget,
        ]);

        return response()->json([
            'project' => $project,
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Project  $project
     * @return \Illuminate\Http\Response
     */
    public function show($environment_id,Project $project)
    {
        //$this->authorize('view', $project->environment());

        /*
        $reports = Report::whereHas('project', function ($query) use ($environment) {
            $query->where('environment_id', '=', $environment->id);
        })->get();
        */
/*
        return view('environments.show')
        ->with(compact('environment'))
        ->with(compact('coUsers'))
        ->with(compact('projects'))
        ->with(compact('reports'))
        ->with(compact('project_categories'))
        ->with(compact('admin'));
        */

        return view('empact_v2.project.show')->with(compact('environment_id'));
    }

    public function edit(Project $project)
    {
        //
    }

    public function update(Request $request, Project $project)
    {
        //
    }

    public function destroy(Project $project)
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

        $project = Project::create([
            'title' => $request->title,
            'description' => $request->description,
            'code' => $request->code,
            'initial_date' => date('Y/m/d', $date),
            'environment_id' => $request->environment_id,
            'project_category_id' => $request->project_category_id,
            'expected_budget' => $request->expected_budget,
        ]);


        return response()->json([
            'project' => $project,
            'url' => $project->url,
            'project_category' => $project->category,
        ]);
    }

    public function change (Request $request){
        $project = Project::find ($request->id);

        $environment = $project->environment;

        $date = strtotime($request->initial_date);

        $project->title = $request->title;
        $project->project_category_id = $request->project_category_id;
        $project->description = $request->description;
        $project->code = $request->code;
        $project->expected_budget = $request->expected_budget;
        $project->initial_date = date('Y/m/d', $date);
        $project->save();

        return response()->json([
            'project' => $project,
            'url' => $project->url,
            'project_category' => $project->category,
        ]);
      }

      public function delete(Request $request){
        $project = Project::find ($request->id);
        $project->archived = true;
        $project->save();
        return response()->json();
      }
}
