<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\Post;
use App\User;
use Faker\Generator as Faker;

$factory->define(Post::class, function (Faker $faker) {
    return [
        //
        'image' => $faker->image('public/storage/images', 640, 480, null, false),
        'content' => $faker->word(),
        'user_id' => factory(User::class)->create()->id,
    ];
});
