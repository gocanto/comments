<?php

use App\Comment\Comment;
use Faker\Generator as Faker;
use Illuminate\Database\Eloquent\Factory;

/** @var Factory $factory */

$factory->define(Comment::class, static function (Faker $faker) {
    return [
        'parent_id' => null,
        'body' => $faker->text,
    ];
});
