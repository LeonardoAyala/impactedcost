<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Environment extends Model
{
    protected $guarded = [];

    public function user() {
        return $this->belongsTo(User::class);
    }

    public function projects(){
        return $this->hasMany(Project::class);
    }

    public function getUrlAttribute(){
        return route("environment.show", $this->id);
    }

/*
    public function getCreatedDateAttribute(){
        return $this->created_at->diffForHumans();
    }
    */
}
