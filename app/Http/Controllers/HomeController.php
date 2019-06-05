<?php

namespace App\Http\Controllers;

use Auth;
use App\Environment;
use App\Project;
use App\Report;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $environments = [];
        if(Auth::check())
        {
            $user = Auth::User();
            $environments = Environment::where('user_id', $user->id)->with('projects')->latest()->paginate(5);
        }

        return view('home', compact('environments'));
    }
}
