<?php

namespace App\Http\Controllers;

use App\Environment;
use Illuminate\Http\Request;
use Illuminate\Support\Str;


use Auth;

class EnvironmentControllerV2 extends Controller
{

    public function __construct()
    {
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user = Auth::User();

        return view('empact_v2.environment');
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
        //$environment = Environment::create($request->all());

        //$environment = Environment::find(1)->get();

        //return response()->json($environment);

        $user = Auth::User();
        $environment = Environment::create([
            'title' => $request->title,
            'description' => $request->description,
            'code' => Str::random(6),
            'password' => Str::random(6),
            'user_id' => '6',
        ]);

        return response()->json($environment);
    }


    /**
     * Display the specified resource.
     *
     * @param  \App\Environment  $environment
     * @return \Illuminate\Http\Response
     */
    public function show(Environment $environment)
    {

    }

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

    public function get(Request $request)
    {
        $environments = Environment::orderBy('created_at', 'desc')->get();
        return response()->json($environments);
    }


}
