<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\Post\Comment;
use Faker\Generator as Faker;

$factory->define(Comment::class, function (Faker $faker) {
    return [
        'body'    => $faker->sentence,
        'user_id' => \App\Models\User\User::all()->random()->id,
    ];
});
