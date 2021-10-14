<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\User;
use App\Models\Comment;
use App\Models\Question;
use Faker\Generator as Faker;


$factory->define(Comment::class, function (Faker $faker) {
    return [
        'comment' => $faker->text(250),
        'created_by' => User::all()->random()->id,
        'question_id' => Question::all()->random()->id
    ];
});
