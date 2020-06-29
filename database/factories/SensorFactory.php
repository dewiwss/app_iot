<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Sensor;
use Faker\Generator as Faker;

$factory->define(Sensor::class, function (Faker $faker) {
    return [
        'sensor_code' => $faker->numberBetween(2018191991919,2020191991919),
        'sensor_name' => $faker->sentence(2),
        'type' => $faker->sentence(1),
        'description' => $faker->paragraph(),
    ];
});
