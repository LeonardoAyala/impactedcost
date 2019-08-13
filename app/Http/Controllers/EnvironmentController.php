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

class EnvironmentController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function show(Environment $environment)
    {

        $this->authorize('view', $environment);

        $user = Auth::User();

        $environment = Environment::find($environment->id);
        $projects = Project::where('environment_id', $environment->id)
        ->where('archived', 0)
        ->with('category')
        ->orderBy('initial_date', 'desc')->latest()->paginate(10);

        $coUsers = User::whereHas('coEnvironments', function ($query) use ($environment) {
            $query->where('environment_id', '=', $environment->id);
        })->latest()->paginate(10);

        $relationship = $environment->coUsers()->wherePivot('administrator', 1)
        ->where('user_id', '=', $user->id)->get();

        if(isset($relationship)){
            $admin = true;
        }
        else{
            $admin = false;
        }

        $project_categories = ProjectCategory::all();

        if( $admin === true){
            $reports = Report::where('environment_id', $environment->id)->where('active', 1)->with('days')
            ->orderBy('created_at', 'desc')->get();

        }else{
            $reports = Report::where('environment_id', $environment->id)->
            where('user_id', $user->id)->with('days')->orderBy('created_at', 'desc')->get();
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
        ->with(compact('reports'))
        ->with(compact('project_categories'))
        ->with(compact('admin'));
    }

    public function edit(Environment $environment)
    {
        //
    }

    public function add(Request $request)
    {
        $rules = array(
            'title' => ['required', 'max:25'],
            'description' => ['required', 'max:100']
          );
        $validator = Validator::make ( Input::all(), $rules);
        if ($validator->fails()){
            return Response::json(array('errors'=> $validator->getMessageBag()->toarray()));
        }
        else {

            $user = Auth::User();
            $environment = Environment::create([
                'title' => $request->title,
                'description' => $request->description,
                'code' => Str::random(6),
                'password' => Str::random(6),
                'user_id' => $user->id
            ]);

            $salary = Salary::create([
                'environment_id' => $environment->id,
                'user_id' => $user->id
            ]);

            $productivity = Productivity::create([
                'environment_id' => $environment->id,
                'user_id' => $user->id
            ]);
            /*
            $join = $user->coEnvironments()->find($environment->id);
            $join->pivot->administrator = true;
            $join->pivot->save();
            */
            // or
            //$user->coEnvironments()->updateExistingPivot($environment->id, ['administrator'=> true]);

            $user->coEnvironments()->attach($environment, ['administrator' => 1]);

            return response()->json([
                'environment' => $environment,
                'url' => $environment->url,
                'user' => $user
            ]);

        }
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

            $productivity = Productivity::create([
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

    public function delete($id)
    {
        $environment = Environment::find($id)->softDelete();
        return response()->json("ok");
    }

    public function destroy($id)
    {
        Environment::find($id)->delete();
        return response()->json("ok");
    }

    public function index(Request $request)
    {
        $environments = Environment::orderBy('created_at', 'desc')->get();
        return response()->json($environments);
    }

    public function store(Request $request)
    {
        $user = Auth::User();
        $environment = Environment::create([
            'title' => $request->title,
            'description' => $request->description,
            'code' => Str::random(6),
            'password' => Str::random(6),
            'user_id' => $user->id
        ]);

        return response()->json($environment);
    }

    public function update(Request $request, $id)
    {
        $environment = Environment::find($id);

        $environment->title = $request->title;
        $environment->description = $request->description;
        $environment->code = $request->code;
        $environment->save();

        return response()->json([
            'environment' => $environment,
            'message' => 'okay',
        ]);
    }

    public function get($id)
    {
        $environment = Environment::find($id);

        return response()->json($environment);
    }

}
