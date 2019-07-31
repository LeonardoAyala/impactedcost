<?php

namespace App\Http\Controllers;

use Auth;
use App\Environment;
use App\Project;
use App\Report;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $environments = [];

        $user = Auth::User();

        $environments = Environment::whereHas('coUsers', function ($query) use ($user) {
            $query->where('user_id', '=', $user->id);
        })->latest()->paginate(10);

        return view('home')
        ->with(compact('environments'));
    }

    public function index_v2()
    {
        $user = Auth::User();

        $environments = Environment::whereHas('coUsers', function ($query) use ($user) {
            $query->where('user_id', '=', $user->id);
        })->latest()->paginate(10);

        return view('empact_v2.home')
        ->with(compact('environments'));
    }
}
