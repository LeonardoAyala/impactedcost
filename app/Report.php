<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;


class Report extends Model
{
    //Formalities

    protected $guarded = [];

    //Relationships

    public function user() {
        return $this->belongsTo(User::class);
    }

    public function environment() {
        return $this->belongsTo(Environment::class);
    }

    public function days() {
        return $this->hasMany(Day::class);
    }

    //Magic Attributes

    public function getTotalHoursAttribute(){

        $amount = $this->days->sum('hours');

        return $amount;
    }

    public function getProductivityAttribute(){

        $amount = (($this->total_hours)/48)*100;


        return number_format((float)$amount, 2, '.', '');
    }

    public function getCreatedReadAttribute(){

        $now = new Carbon();
        $date = new Carbon($this->created_at);
        $date->setLocale('es');
        return $date->diffForHumans($now);

    }

    public function getImpactedcostAttribute(){

        $end_date = Carbon::parse($this->initial_date);
        $end_date = $end_date->copy()->add( 6, 'day');

        $end_date = strtotime($end_date);

        $amount = $this->user->salaries()->whereDate('created_at', '<=', date('Y/m/d', $end_date))
        ->latest()->first()->amount;

        if(empty($amount)){
            $amount = 0;
        }

        $amount = ($this->total_hours)*($this->user->salaries()->latest()->first()->amount);

        return number_format((float)$amount, 2, '.', '');
    }
}
