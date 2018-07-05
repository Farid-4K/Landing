<?php

use Faker\Generator as Faker;

$factory->define(App\Admin\Order::class, function (Faker $faker) {
    return [
        'name' => $faker->name,
        'email' => $faker->email,
        'phone' => '+7(920)459-99-99',
        'count' => '7',
        'message' => $faker->text(50),
        'grant' => 'on',
    ];
});
