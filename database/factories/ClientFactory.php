<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Client;
use Faker\Generator as Faker;

$factory->define(Client::class, function (Faker $faker) {
    return [
        'firstname' => $faker->name,
        'lastname' => $faker->name,
        'email' => $faker->unique()->email,
        'phone' => $faker->phoneNumber,
        'address' => $faker->address,
        'district' => $faker->word,
        'city' => $faker->city,
        'country' => $faker->country
    ];
});
