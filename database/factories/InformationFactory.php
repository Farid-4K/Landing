<?php

use Faker\Generator as Faker;


$factory->define(App\Admin\Information::class, function (Faker $faker) {
    return [
        'tag_id' => $faker->name(5),
        'description' => $faker->text(10),
        'information' => $faker->text(50),
    ];
});
