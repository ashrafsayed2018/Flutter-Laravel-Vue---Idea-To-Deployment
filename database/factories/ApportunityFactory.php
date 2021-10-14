<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\User;
use App\Models\Apportunity;
use Faker\Generator as Faker;
use App\Models\Lookups\Country;
use App\Models\Lookups\Category;


// $table->string('title');
// $table->text('description');
// $table->unsignedTinyInteger('category_id');
// $table->unsignedSmallInteger('country_id');
// $table->timestamp('deadline');
// $table->string('organizer');
// $table->unsignedBigInteger('created_by');

$factory->define(Apportunity::class, function (Faker $faker) {
    return [
        'title' => $faker->sentence(15),
        'description' => $faker->text(150),
        'category_id' => Category::all()->random()->id,
        'country_id'  => Country::all()->random()->id,
        'deadline'    => $faker->dateTime(),
        'organizer'   => $faker->company(),
        'created_by'  => User::all()->random()->id
    ];
});
