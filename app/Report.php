<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Report extends Model
{
    protected $guarded = [];

    public function user() {
        return $this->belongsTo(User::class);
    }

    public function environment() {
        return $this->belongsTo(Environment::class);
    }

    public function days() {
        return $this->hasMany(Day::class);
    }

    public function getTotalhoursAttribute(){

        $amount = $this->days->sum('hours');

        return $amount;
    }

    public function getProductivityAttribute(){

        $amount = (($this->totalhours)/48)*100;


        return number_format((float)$amount, 2, '.', '');
    }

    public function getImpactedcostAttribute(){

        $amount = ($this->totalhours)*($this->user->latestSalary->first()->amount);

        return number_format((float)$amount, 2, '.', '');
    }
}
