<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

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
        $date = \Carbon\Carbon::parse($this->initial_date)->format('l');
        return $date;
    }

    public function getDateAttribute(){
        $date = \Carbon\Carbon::parse($this->initial_date)->format('d/m/Y');
        return $date;
    }
}
