<?php

namespace App\Http\Controllers;

use App\Project;
use App\Environment;
use Illuminate\Http\Request;
use Auth;

class ProjectController extends Controller
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
    public function create(Environment $environment)
    {
        return view('projects.create', compact('environment'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Environment $environment ,Request $request)
    {
        $this->validate($request ,[
            'title' => ['required', 'max:25'],
            'description' => ['required', 'max:100'],
            'code' => ['required', 'max:10'],
            'initial_date' => ['required', 'date', 'date_format:d-m-Y']
        ]);

        /*
        $rules = [
            'start_at'      => 'required|date|date_format:Y-m-d|after:yesterday',
            'end_at'        => 'required|date|date_format:Y-m-d|after:xxxx',
        ];
        */

        $date = strtotime($request->initial_date);


        if(Auth::check())
        {
            $user = Auth::User();
            $project = Project::create([
                'code' => $request->code,
                'title' => $request->title,
                'description' => $request->description,
                'initial_date' => date('Y/m/d', $date),
                'environment_id' => $environment->id
            ]);
/*
            $table->string('code')->unique();
            $table->string('title');
            $table->mediumText('description');
            $table->date('initial_date');
            $table->bigInteger('environment_id')->unsigned();
*/
            return redirect('environment/'.$environment->id);
        }

        return redirect('register');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Project  $project
     * @return \Illuminate\Http\Response
     */
    public function show(Project $project)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Project  $project
     * @return \Illuminate\Http\Response
     */
    public function edit(Project $project)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Project  $project
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Project $project)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Project  $project
     * @return \Illuminate\Http\Response
     */
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

        if(Auth::check())
        {
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
