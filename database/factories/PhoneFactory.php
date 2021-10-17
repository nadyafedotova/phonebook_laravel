<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\Phone;
use Faker\Factory;

$factory->define(Phone::class, function () {
    $faker = Factory::create('uk_UA');

    return [
        'phone' => $faker->unique()->e164PhoneNumber(),
        'last_name' => $faker->lastName(),
    ];
});
