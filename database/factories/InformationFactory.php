<?php

use Faker\Generator as Faker;

$factory->define(
  App\Admin\Information::class, function (Faker $faker) {
   return [
     'tag_id'      => trim(preg_replace('~\s+~s', '', $faker->name('male'))),
     'description' => $faker->text(10),
     'information' => $faker->text(50),
   ];
});
