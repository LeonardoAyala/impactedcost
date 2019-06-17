<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Environment;
use App\Project;
use App\Report;
use App\Day;

use Auth;

class ReportController extends Controller
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
        $projects = Project::where('environment_id', $environment->id)->orderBy('title', 'desc')->get();



        return view('reports.create')
        ->with(compact('environment'))
        ->with(compact('projects'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Environment $environment, Request $request)
    {
        $this->validate($request ,[
            'monday_hours' => ['required'],
            'tuesday_hours' => ['required'],
            'wednesday_hours' => ['required'],
            'thursday_hours' => ['required'],
            'friday_hours' => ['required'],
            'saturday_hours' => ['required'],
            'sunday_hours' => ['required'],
            'date' => ['required', 'date', 'date_format:d-m-Y', 'before:'.\Carbon\Carbon::now()->startOfWeek()]
        ]);

        $date = strtotime($request->initial_date);



        if(Auth::check())
        {
            $user = Auth::User();

            $initial_date = strtotime($request->date);

            $monday_date = \Carbon\Carbon::parse($initial_date)->startOfWeek();
            $tuesday_date = $monday_date->copy()->addDay();
            $wednesday_date = $tuesday_date->copy()->addDay();
            $thursday_date = $wednesday_date->copy()->addDay();
            $friday_date = $thursday_date->copy()->addDay();
            $saturday_date = $friday_date->copy()->addDay();
            $sunday_date = $saturday_date->copy()->addDay();

            $report = Report::create([
                'initial_date' => date('Y/m/d', strtotime($monday_date)),
                'environment_id' =>  $environment->id,
                'user_id' => $user->id
            ]);

            $hours = 0;
            $projectID = null;
            if($request->monday_project != 0)
            {
                $projectID = $request->monday_project;
                $hours = $request->monday_hours;
            }

            $monday = Day::create([
                'date' => date('Y/m/d', strtotime($monday_date)),
                'project_id' =>  $projectID,
                'description' => null,
                'hours' => $hours,
                'report_id' => $report->id
            ]);

            $hours = 0;
            $projectID = null;
            if($request->tuesday_project != 0)
            {
                $projectID = $request->tuesday_project;
                $hours = $request->tuesday_hours;
            }

            $tuesday = Day::create([
                'date' => date('Y/m/d', strtotime($tuesday_date)),
                'project_id' =>  $projectID,
                'description' => null,
                'hours' => $hours,
                'report_id' => $report->id
            ]);

            $hours = 0;
            $projectID = null;
            if($request->wednesday_project != 0)
            {
                $projectID = $request->wednesday_project;
                $hours = $request->wednesday_hours;
            }

            $wednesday = Day::create([
                'date' => date('Y/m/d', strtotime($wednesday_date)),
                'project_id' =>  $projectID,
                'description' => null,
                'hours' => $hours,
                'report_id' => $report->id
            ]);

            $hours = 0;
            $projectID = null;
            if($request->thursday_project != 0)
            {
                $projectID = $request->thursday_project;
                $hours = $request->thursday_hours;
            }

            $thursday = Day::create([
                'date' => date('Y/m/d', strtotime($thursday_date)),
                'project_id' =>  $projectID,
                'description' => null,
                'hours' => $hours,
                'report_id' => $report->id
            ]);

            $hours = 0;
            $projectID = null;
            if($request->friday_project != 0)
            {
                $projectID = $request->friday_project;
                $hours = $request->friday_hours;
            }

            $friday = Day::create([
                'date' => date('Y/m/d', strtotime($friday_date)),
                'project_id' =>  $projectID,
                'description' => null,
                'hours' => $hours,
                'report_id' => $report->id
            ]);

            $hours = 0;
            $projectID = null;
            if($request->saturday_project != 0)
            {
                $projectID = $request->saturday_project;
                $hours = $request->saturday_hours;
            }

            $saturday = Day::create([
                'date' => date('Y/m/d', strtotime($saturday_date)),
                'project_id' =>  $projectID,
                'description' => null,
                'hours' => $hours,
                'report_id' => $report->id
            ]);

            $hours = 0;
            $projectID = null;
            if($request->sunday_project != 0)
            {
                $projectID = $request->sunday_project;
                $hours = $request->sunday_hours;

            }

            $sunday = Day::create([
                'date' => date('Y/m/d', strtotime($sunday_date)),
                'project_id' =>  $projectID,
                'description' => null,
                'hours' => $hours,
                'report_id' => $report->id
            ]);

            /*
            $user->roles()->attach(Role::where('name','User')->first());
*/

            return redirect('environment/'.$environment->id);
        }

        return redirect('register');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Report  $report
     * @return \Illuminate\Http\Response
     */
    public function show(Report $report)
    {
        /*
        $table->integer('monday')->default(0);
        $table->integer('tuesday')->default(0);
        $table->integer('wednesday')->default(0);
        $table->integer('thursday')->default(0);
        $table->integer('friday')->default(0);
        $table->integer('saturday')->default(0);
        $table->integer('sunday')->default(0);
        $table->date('initial_date');
        $table->bigInteger('project_id')->unsigned();
        $table->bigInteger('user_id')->unsigned();
        */
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Report  $report
     * @return \Illuminate\Http\Response
     */
    public function edit(Report $report)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Report  $report
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Report $report)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Report  $report
     * @return \Illuminate\Http\Response
     */
    public function destroy(Report $report)
    {
        //
    }
}
