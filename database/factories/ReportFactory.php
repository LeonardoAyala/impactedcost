<?php

/* @var $factory \Illuminate\Database\Eloquent\Factory */

use App\Report;
use App\Project;
use App\User;
use Faker\Generator as Faker;

$factory->define(Report::class, function (Faker $faker) {
    return [
        'monday' => rand (0 , 24),
        'tuesday' => rand (0 , 24),
        'wednesday' => rand (0 , 24),
        'thursday' => rand (0 , 24),
        'friday' => rand (0 , 24),
        'saturday' => rand (0 , 24),
        'sunday' => rand (0 , 24),
        'initial_date' => $faker->date($format = 'Y-m-d', $max = 'now'),
        'project_id' => Project::all()->random()->id,
        'user_id' => User::all()->random()->id
    ];

});
