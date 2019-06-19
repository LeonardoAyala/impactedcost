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
        $date = \Carbon\Carbon::parse(strtotime($this->date))->format('l');
        return $date;
    }

    public function getReaddateAttribute(){
        $date = \Carbon\Carbon::parse(strtotime($this->date))->format('d/m/Y');
        return $date;
    }
}
