<?php

use App\Models\User\User;
use Illuminate\Database\Seeder;

class PostSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $tags = \App\Models\Post\Tag::all()->pluck('id')->toArray();

        factory(\App\Models\Post\Post::class, 100)->create()->each(function ($post) use ($tags) {
            $post->comments()->save(factory(\App\Models\Post\Comment::class)->make());
            $post->tags()->sync($tags[rand(0, 24)]);
        });
    }
}
