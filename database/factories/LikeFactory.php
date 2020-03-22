<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\Post\Like;
use Faker\Generator as Faker;

$factory->define(Like::class, function (Faker $faker) {
    return [
        'post_id' => \App\Models\Post\Post::all()->random()->id,
        'user_id' => \App\Models\User\User::all()->random()->id,
    ];
});
