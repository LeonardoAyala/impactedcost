<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    protected $guarded = [];

    public function environment() {
        return $this->belongsTo(Environment::class);
    }

    public function reports(){
        return $this->hasMany(Report::class);
    }

    public function getDateAttribute(){
        $date = \Carbon\Carbon::parse($this->initial_date)->format('d/m/Y');
        return $date;
    }


    public function getUrlAttribute(Environment $environment){
        return url('environment/'.$environment->id.'/report/'.$this->id);
    }


}
