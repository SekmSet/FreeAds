<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */
use App\Image;
use Faker\Generator as Faker;

$factory->define(Image::class, function (Faker $faker) {
    return [
        'url' => $faker->randomElement(['image-1.jpg', 'image-2.jpg', 'image-3.jpg']),
    ];
});
