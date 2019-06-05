<?php

/* @var $factory \Illuminate\Database\Eloquent\Factory */

use App\Environment;
use App\User;

use Illuminate\Support\Str;
use Illuminate\Support\Facades\Hash;

use Faker\Generator as Faker;


$factory->define(Environment::class, function (Faker $faker) {
    return [
        'title' => rtrim($faker->sentence(rand(1, 3)), '.'),
        'description' => $faker->paragraph(),
        'code' => Str::random(6),
        'password' => Hash::make(Str::random(6)),
        'user_id' => User::all()->random()->id
    ];

});
