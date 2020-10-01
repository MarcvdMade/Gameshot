<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Model;
use Faker\Generator as Faker;

$factory->define(Posts::class, function (Faker $faker) {
    return [
        'title' => $faker->title,
        'description' => $faker->text,
        'image' => $faker->image('public/storage/images',400,300, null, false),
        'user_id' => '1',
        'genre_id' => '1',
        'game_id' => '1',
        'hidden' => '0'
    ];
});
