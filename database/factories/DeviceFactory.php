<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Device;
use Faker\Generator as Faker;

$factory->define(Device::class, function (Faker $faker) {
    return [
        'device_numbercode' => $faker->numberBetween(2018191991919,2020191991919),
        'device_name' => $faker->sentence(2),
        'description' => $faker->paragraph(),
        'user_id' => $faker->randomElement([1,2])

    ];
});
