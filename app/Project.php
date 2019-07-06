<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    protected $guarded = [];

    public function environment() {
        return $this->belongsTo(Environment::class);
    }

    public function days(){
        return $this->hasMany(Day::class);
    }

    public function category(){
        return $this->hasOne(ProjectCategory::class, 'id', 'project_category_id');
    }

    /*
    public function days(){

    }

*/

    public function getDateAttribute(){
        $date = \Carbon\Carbon::parse($this->initial_date)->format('d/m/Y');
        return $date;
    }

    public function getUrlAttribute(){

        $environment = $this->environment;

        return url('environment/'.$environment->id.'/project/'.$this->id);
    }

    public function getImpactedcostAttribute(){

        $days = $this->days;
        $amount = 0.00;
        foreach($days as $day){
            $amount += ($day->hours)*($day->report->user->salaries()->latest()->first()->amount);
        }

        return number_format((float)$amount, 2, '.', '');
    }

    public function getTotalhoursAttribute(){

        $amount = $this->days->sum('hours');

        return $amount;
    }

}
