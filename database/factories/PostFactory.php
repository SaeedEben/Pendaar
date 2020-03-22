<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\Post\Post;
use Faker\Generator as Faker;

$factory->define(Post::class, function (Faker $faker) {
    return [
        'title'    => $faker->name,
        'body'     => $faker->sentence,
        'category' => $faker->randomElement(Post::CATEGORY),
        'user_id'  => 1,
    ];
});
