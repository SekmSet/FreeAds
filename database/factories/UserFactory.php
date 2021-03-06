<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */
use App\Color;
use App\Theme;
use App\User;
use Faker\Generator as Faker;
use Illuminate\Support\Str;

/*
|--------------------------------------------------------------------------
| Model Factories
|--------------------------------------------------------------------------
|
| This directory should contain each of the model factory definitions for
| your application. Factories provide a convenient way to generate new
| model instances for testing / seeding your application's database.
|
*/

$factory->define(User::class, function (Faker $faker) {
    $colors = Color::all('id')->pluck('id')->toArray();
    $themes = Theme::all('id')->pluck('id')->toArray();

    return [
        'color_id' => $colors[array_rand($colors)],
        'theme_id' => $themes[array_rand($themes)],
        'name' => $faker->name,
        'email' => $faker->unique()->safeEmail,
        'pseudo' => $faker->userName,
        'telephone' => $faker->e164PhoneNumber,
        'sexe' => $faker->randomElement(['F', 'M']),
        'date_naissance' => $faker->dateTimeThisCentury->format('Y-m-d'),
        'email_verified_at' => now(),
        'city' => $faker->city,
        'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password
        'remember_token' => Str::random(10),
    ];
});
