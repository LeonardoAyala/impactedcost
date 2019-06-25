<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;


    protected $table = 'users';
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $guarded = [];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function environments(){
        return $this->hasMany(Environment::class);
    }

    public function reports(){
        return $this->hasMany(Report::class);
    }


    public function salaries(){
        return $this->hasMany(Salary::class);
    }

    public function latestSalary(){
        return $this->hasMany(Salary::class)->latest();
    }

    public function coEnvironments(){
        return $this->belongsToMany(Environment::class, 'environment_user', 'user_id', 'environment_id')->withTimestamps();
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
