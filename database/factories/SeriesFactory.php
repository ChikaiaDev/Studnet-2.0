<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Series;
use Faker\Generator as Faker;
use Illuminate\Support\Str;

$factory->define(Series::class, function (Faker $faker) {
    return [
        'title'=>$faker->colorName,
        'description'=>$faker->paragraph,
        'user_id'=>$faker->numberBetween(1,3),
    ];
});
