<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\ApportunityDetails;
use Faker\Generator as Faker;



$factory->define(ApportunityDetails::class, function (Faker $faker) {
    return [
        'benefits' => $faker->text(160),
        'application_process' => $faker->text(100),
        'further_queries' => $faker->text(100),
        'eligibilities'   => $faker->text(200),
        'start_date'   => $faker->dateTime(),
        'end_date'   => $faker->dateTime(),
        'official_links'   => $faker->url,
    ];
});
