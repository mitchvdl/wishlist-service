<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Model;
use Faker\Generator as Faker;

$factory->define(\App\Models\WishlistItem::class, function (Faker $faker) {
    return [
        'wishlist_uuid' => factory(\App\Models\Wishlist::class),
        'asin' => $faker->isbn13,
        'title' => $faker->text(100),
        'image_url' => $faker->imageUrl(100),
        'currency' => 'EUR',
        'amount' => $faker->randomNumber(9)/1e8,
        'qty' => $faker->randomNumber(2),
        'meta' => null,
    ];
});
