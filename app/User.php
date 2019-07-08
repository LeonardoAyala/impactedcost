<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    //Formalities

    use Notifiable;

    protected $table = 'users';

    protected $guarded = [];

    protected $hidden = [
        'password', 'remember_token',
    ];

    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    //Relationships

    public function environments(){
        return $this->hasMany(Environment::class);
    }

    public function reports(){
        return $this->hasMany(Report::class);
    }

    public function salaries(){
        return $this->hasMany(Salary::class);
    }

    public function days($environment_id){
        return $this->hasManyThrough(Day::class, Report::class)->where('environment_id', $environment_id);
    }

    public function coEnvironments(){
        return $this->belongsToMany(Environment::class, 'environment_user', 'user_id', 'environment_id')
        ->withPivot('administrator')
        ->withTimestamps();
    }

    //Magic attributes

    public function getUrlAttribute(){
        return route("user.show", $this->id);
    }

    public function getTotalHoursAttribute(){

        $hours = 0;

        foreach($this->reports as $report){
                $hours += $report->total_hours;
        }

        return $hours;
    }

    //Integrated gets

    public function getEnvironmentSalary($environment_id){

        $salary = $this->salaries()->where('environment_id', $environment_id)->latest()->first();

        if(isset($salary)){
            $amount = $salary->amount;
        } else{
            $amount = 0;
        }

        return $amount;
    }

    public function getEnvironmentHours($environment_id){

        $hours = $this->days($environment_id)->sum('hours');

        $users = User::select('name')->distinct()->get();

        return $hours;
    }

    public function getEnvironmentRealProductivity($environment_id){

        $days = $this->days($environment_id);

        $hours = $days->sum('hours');

        $distinct_days = $days->select('date')->distinct()->count();

        if($hours <= 0){
            $amount = 0;
        } else{
            $amount = (($hours)/(8 * $distinct_days))*100;
        }

        return number_format((float)$amount, 2, '.', '');
    }

    public function getEnvironmentPartialProductivity($environment_id){

        $hours = $this->days($environment_id)->sum('hours');

        $weeks = $this->reports->count();

        if($hours <= 0){
            $amount = 0;
        } else{
            $amount = (($hours)/(48 * $weeks))*100;
        }

        return number_format((float)$amount, 2, '.', '');
    }

}
