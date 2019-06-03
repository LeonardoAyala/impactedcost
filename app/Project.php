<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    protected $guarded = [];

    public function environment() {
        return $this->belongsTo(Environment::class);
    }
}
