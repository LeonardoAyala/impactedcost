<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DayController extends Controller
{

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
