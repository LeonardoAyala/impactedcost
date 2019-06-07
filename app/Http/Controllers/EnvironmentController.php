<?php

namespace App\Http\Controllers;

use App\Environment;
use App\Project;
use App\Report;
use Illuminate\Http\Request;
use Illuminate\Support\Arr;
use Faker\Generator as Faker;
use Auth;
use Illuminate\Support\Str;

class EnvironmentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $environments = Environment::with('user')->latest()->paginate(5);

        return view('environments.index', compact('environments'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('environments.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request ,[
            'title' => ['required', 'max:25'],
            'description' => ['required', 'max:100']
        ]);

        if(Auth::check())
        {
            $user = Auth::User();
            $environment = Environment::create([
                'title' => $request->title,
                'description' => $request->description,
                'code' => Str::random(6),
                'password' => Str::random(6),
                'user_id' => $user->id
            ]);

            $user->coEnvironments()->attach($environment);

            return redirect('environment/'.$environment->id);
        }

        return redirect('register');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Environment  $environment
     * @return \Illuminate\Http\Response
     */
    public function show(Environment $environment)
    {

        $environment = Environment::find($environment->id);
        $projects = Project::where('environment_id', $environment->id)->orderBy('initial_date', 'desc')->paginate(5);

        $reports = Report::where('environment_id', $environment->id)->orderBy('initial_date', 'desc')->paginate(5);

        /*
        $reports = Report::whereHas('project', function ($query) use ($environment) {
            $query->where('environment_id', '=', $environment->id);
        })->get();
        */

        return view('environments.show')
        ->with(compact('environment'))
        ->with(compact('projects'))
        ->with(compact('reports'));
    }
/*
    public function show(Environment $environment)
    {

        $projects = Project::where('environment_id', $environment->id)->with('reports')->orderBy('initial_date', 'desc')->paginate(5);

        return view('environments.show', compact('projects'), compact('environment'));
    }
*/
    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Environment  $environment
     * @return \Illuminate\Http\Response
     */
    public function edit(Environment $environment)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Environment  $environment
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Environment $environment)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Environment  $environment
     * @return \Illuminate\Http\Response
     */
    public function destroy(Environment $environment)
    {
        //
    }
}
