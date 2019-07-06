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

    //Magic attributes

    public function latestSalary(){
        return $this->salaries()->latest();
    }

    //Integrated gets


    public function getEnvironmentSalary($environment_id){

        $salary = $this->salaries()->where('environment_id', $environment_id)->latest()->first();

        return $salary->amount;
    }

    public function coEnvironments(){
        return $this->belongsToMany(Environment::class, 'environment_user', 'user_id', 'environment_id')
        ->withPivot('administrator')
        ->withTimestamps();
    }

    public function getUrlAttribute(){
        return route("user.show", $this->id);
    }

    public function getSalaryAttribute(){
        $latest = $this->latestSalary()->first();

        if(!$latest){
            return null;
        }
        else{
            return $latest->amount;
        }

    }

    public function getProductivityAttribute(){

        $weeks = $this->reports->count();

        $total_hours = $this->total_hours;

        if($total_hours <= 0){
            $amount = 0;
        } else{
            $amount = (($total_hours)/(48 * $weeks))*100;
        }

        return number_format((float)$amount, 2, '.', '');
    }

    public function getTotalHoursAttribute(){

        $hours = 0;

        foreach($this->reports as $report){

                $hours += $report->totalhours;
        }

        return $hours;
    }
}
