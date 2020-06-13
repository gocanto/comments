<?php

use App\Comment\Comment;
use Faker\Factory;
use Illuminate\Database\Seeder;

class CommentsSeeder extends Seeder
{
    public function run(): void
    {
        $faker = Factory::create();

        $parent = factory(Comment::class)->create();

        $children = factory(Comment::class)->create([
            'parent_id' => $parent->id,
            'body' => 'children >>> ' . $faker->text,
        ]);

        $depth = factory(Comment::class)->create([
            'parent_id' => $children->id,
            'body' => 'depth >>> ' . $faker->text,
        ]);

        factory(Comment::class)->create([
            'parent_id' => $children->id,
            'body' => 'depth 2 >>> ' . $faker->text,
        ]);

        factory(Comment::class)->create([
            'parent_id' => $depth->id,
            'body' => 'last >>> ' . $faker->text,
        ]);
    }
}
