<?php

/* @var $factory \Illuminate\Database\Eloquent\Factory */

use App\Project;
use App\Environment;
use Faker\Generator as Faker;

use Illuminate\Support\Str;

$factory->define(Project::class, function (Faker $faker) {
    return [
        'code' => Str::random(6),
        'title' => rtrim($faker->sentence(rand(1, 3)), '.'),
        'description' => $faker->paragraph(),
        'initial_date' => $faker->date($format = 'Y-m-d', $max = 'now'),
        'environment_id' => Environment::all()->random()->id
    ];

});
