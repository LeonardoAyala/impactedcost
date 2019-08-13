<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Environment extends Model
{
    protected $guarded = [];

    public function user() {
        return $this->belongsTo(User::class);
    }

    public function coUsers()
    {
        return $this->belongsToMany(User::class, 'environment_user', 'environment_id', 'user_id')
        ->withPivot('administrator')
        ->withTimestamps();
    }

    public function projects(){
        return $this->hasMany(Project::class);
    }

    public function getUrlAttribute(){
        return route("environment.show", $this->id);
    }

    public function softDelete(){
        $this->active = 0;
        $this->save();
    }

/*
    public function getCreatedDateAttribute(){
        return $this->created_at->diffForHumans();
    }
    */
}
