<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Arr;
use Illuminate\Support\Str;
use Faker\Generator as Faker;
use Yajra\DataTables\DataTables;

use App\Environment;
use App\Project;
use App\Report;
use App\User;
use App\Salary;

use Auth;

class EnvironmentController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {

    }

    public function create()
    {
        //return view('environments.create');
    }

    public function store(Request $request)
    {
        $this->validate($request ,[
            'title' => ['required', 'max:25'],
            'description' => ['required', 'max:100']
        ]);

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

    public function show(Environment $environment)
    {
        $environment = Environment::find($environment->id);
        $projects = Project::where('environment_id', $environment->id)->orderBy('initial_date', 'desc')->latest()->paginate(10);

        $coUsers = User::whereHas('coEnvironments', function ($query) use ($environment) {
            $query->where('environment_id', '=', $environment->id);
        })->latest()->paginate(10);

        $user = Auth::User();

        if( $environment->user->id === $user->id){
            $reports = Report::where('environment_id', $environment->id)->with('days')->orderBy('initial_date', 'desc')->get();
        }else{
            $reports = Report::where('environment_id', $environment->id)->
            where('user_id', $user->id)->with('days')->orderBy('initial_date', 'desc')->get();
        }

        /*
        $reports = Report::whereHas('project', function ($query) use ($environment) {
            $query->where('environment_id', '=', $environment->id);
        })->get();
        */

        return view('environments.show')
        ->with(compact('environment'))
        ->with(compact('coUsers'))
        ->with(compact('projects'))
        ->with(compact('reports'));
    }

    public function edit(Environment $environment)
    {
        //
    }

    public function update(Request $request, Environment $environment)
    {
        //
    }

    public function destroy(Environment $environment)
    {

    }


    public function add(Request $request)
    {

    $this->validate($request ,[
        'title' => ['required', 'max:25'],
        'description' => ['required', 'max:100']
    ]);

    $user = Auth::User();
    $environment = Environment::create([
        'title' => $request->title,
        'description' => $request->description,
        'code' => Str::random(6),
        'password' => Str::random(6),
        'user_id' => $user->id
    ]);

    $user->coEnvironments()->attach($environment);

    return response()->json([
        'environment' => $environment,
        'url' => $environment->url,
        'user' => $user
    ]);


    return Response::json(array('errors'=> $validator->getMessageBag()->toarray()));

  }

  public function change (Request $request){
    $environment = Environment::find ($request->id);

    $user = $environment->user->name;

    $environment->title = $request->title;
    $environment->description = $request->description;
    $environment->code = $request->code;
    $environment->password = $request->password;
    $environment->save();
    return response()->json([
        'environment' => $environment,
        'url' => $environment->url,
        'user' => $user
    ]);
  }

  public function delete(Request $request){
    $environment = Environment::find ($request->id)->delete();
    return response()->json();
  }

public function join (Request $request){
    $this->validate($request ,[
        'code' => 'required',
        'password' => 'required'
    ]);

    $user = Auth::User();
    $environment = Environment::where('code', '=', $request->code)->where('password', '=', $request->password)->first();

    if(isset($environment))
    {
        $user->coEnvironments()->attach($environment);

        $salary = Salary::create([
            'environment_id' => $environment->id,
            'user_id' => $user->id
        ]);

        return response()->json([
            'environment' => $environment,
            'url' => $environment->url,
            'user' => $environment->user
        ]);

        return Response::json(array('errors'=> $validator->getMessageBag()->toarray()));
    }

}

}
