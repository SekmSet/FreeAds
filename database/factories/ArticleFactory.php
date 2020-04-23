<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */
use App\Article;
use App\Color;
use App\Theme;
use App\User;
use Faker\Generator as Faker;

$factory->define(Article::class, function (Faker $faker) {
    return [
        'user_id' => function () {
            return factory(User::class);
        },
        'color_id' => function () {
            return factory(Color::class);
        },
        'theme_id' => function () {
            return factory(Theme::class);
        },

        'title' => $faker->name,
        'resum' => $faker->text(200),
        'price' => $faker->numberBetween(1, 1000),
        'city' => $faker->city,
    ];
});
