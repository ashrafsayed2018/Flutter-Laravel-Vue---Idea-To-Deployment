<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\User;
use App\Models\Question;
use Faker\Generator as Faker;


$factory->define(Question::class, function (Faker $faker) {
    return [
        'question' => $faker->text(100),
        'created_by' => User::all()->random()->id
    ];
});
