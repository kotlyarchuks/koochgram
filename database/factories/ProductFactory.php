<?php

/* @var $factory \Illuminate\Database\Eloquent\Factory */

use App\Product;
use Faker\Generator as Faker;

$factory->define(Product::class, function (Faker $faker) {
    return [
        'title' => $faker->word,
        'description' => $faker->text(50),
        'price' => rand(1000, 50000),
        'image' => 'https://picsum.photos/293'
    ];
});
