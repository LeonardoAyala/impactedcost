<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

class Day extends Model
{
    protected $guarded = [];

    public function project() {
        return $this->belongsTo(Project::class);
    }

    public function report(){
        return $this->belongsTo(Report::class);
    }

    public function getDayweekAttribute(){
        Carbon::setLocale('es');
        $date = Carbon::parse(strtotime($this->date))->format('l');

        if($date == 'Monday')
            $date = 'Lunes';

        if($date == 'Tuesday')
            $date = 'Martes';

        if($date == 'Wednesday')
            $date = 'Miércoles';

        if($date == 'Thursday')
            $date = 'Jueves';

        if($date == 'Friday')
            $date = 'Viernes';

        if($date == 'Saturday')
            $date = 'Sábado';

        if($date == 'Sunday')
            $date = 'Domingo';

        return $date;
    }

    public function getReaddateAttribute(){
        $date = Carbon::parse(strtotime($this->date))->format('d/m/Y');
        return $date;
    }
}
