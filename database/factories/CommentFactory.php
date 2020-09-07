<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\Comment;
use App\User;
use App\Models\Post;
use Faker\Generator as Faker;

$factory->define(Comment::class, function (Faker $faker) {
    return [
        //
        'body' => $faker->word(),
        'user_id' => factory(User::class)->create()->id,
        'post_id' => factory(Post::class)->create()->id,
    ];
});
