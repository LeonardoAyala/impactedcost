<?php

namespace App\Http\Controllers;

use Auth;
use App\Environment;
use App\Project;
use App\Report;
use App\Post;
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

        $post = Post::paginate(20);

        return view('home')
        ->with(compact('environments'))
        ->with(compact('post'));
    }
}
