<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Post;
use Faker\Generator as Faker;

$factory->define(Post::class, function (Faker $faker) {
    return [
        'title' => $faker->sentence,
        'description' => $faker->paragraph,
        'image' => $faker->image('public/storage/postimage',400,300),
        'user_id' => factory(User::class),
        'game_id' => '1',
        'hidden' => '0'
    ];
});
