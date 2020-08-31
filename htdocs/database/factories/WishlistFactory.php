<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */


use Faker\Generator as Faker;

$factory->define(\App\Models\Wishlist::class, function (Faker $faker) {
    return [
        'name' => $faker->name,
        'sharing_code' => $faker->boolean(20) ? md5($faker->name) : null,
    ];
});
