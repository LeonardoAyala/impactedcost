<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Environment;
use App\Project;
use App\Report;
use App\User;
use App\Salary;

use Auth;


class JoinController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        //
    }

    public function create()
    {
        return view('joins.create');
    }

    public function store(Request $request)
    {
        $this->validate($request ,[
            'code' => 'required',
            'password' => 'required'
        ]);

        $user = Auth::User();
        $environment = Environment::where('code', '=', $request->code)->where('password', '=', $request->password)->first();

        if(isset($environment))
        {
            $user->coEnvironments()->attach($environment);

            return redirect('environment/'.$environment->id);
        }

        return redirect('home');
    }

    public function show($id)
    {
        //
    }

    public function edit($id)
    {
        //
    }

    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function change (Request $request){
        $environment = Environment::find ($request->environment_id);
        $user = User::find ($request->user_id);

        $salary = Salary::create([
            'environment_id' => $environment->id,
            'user_id' => $user->id,
            'amount' => $request->amount
        ]);

        return response()->json([
            'coUser' => $user,
            'salary' => $salary,
            'environment' => $environment
        ]);
      }



      public function delete(Request $request){

        $environment = Environment::find ($request->environment_id);

        $environment->coUsers()->where('user_id', $request->user_id)->detach(1);

        //$managementUnit->councils()->where('id', 1)->wherePivot('year', 2011)->detach(1);

        return response()->json();
      }



}
