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
}
