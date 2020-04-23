<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */
use App\Message;
use App\User;
use Faker\Generator as Faker;
use Illuminate\Database\Eloquent\Model;

$factory->define(Message::class, function (Faker $faker, $id) {
    $users = User::where('id', '!=', $id)->select('id')->pluck('id')->toArray();

    return [
        'repeater_id' => $users[array_rand($users)],
        'content' => $faker->paragraph($nbSentences = 5, $variableNbSentences = true),
    ];
});
