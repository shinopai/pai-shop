<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Item;
use Faker\Generator as Faker;

$factory->define(Item::class, function (Faker $faker) {
    $images = [
        'outer.jpg',
        'pants.jpg',
        'shoes.jpg',
        'tops.jpg',
        'watch.webp'
    ];

    return [
        'item_name' => $faker->name,
        'body' => $faker->sentence(3),
        'price' => $faker->biasedNumberBetween(3000, 40000),
        'item_image' => $images[rand(0, 4)],
        'category_id' => rand(1, 4)
    ];
});
