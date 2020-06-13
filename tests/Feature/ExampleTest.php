<?php

namespace Tests\Feature;

use App\Comment;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class ExampleTest extends TestCase
{
    use RefreshDatabase;

    /**
     * @test
     */
    public function fooBar(): void
    {
        $parent = factory(Comment::class)->create();

        $children = factory(Comment::class)->create([
            'parent_id' => $parent->id,
            'body' => 'children',
        ]);

        $depth = factory(Comment::class)->create([
            'parent_id' => $children->id,
            'body' => 'depth',
        ]);

        $depth02 = factory(Comment::class)->create([
            'parent_id' => $children->id,
            'body' => 'depth 2',
        ]);

        $last = factory(Comment::class)->create([
            'parent_id' => $depth->id,
            'body' => 'last',
        ]);

        $comments = Comment::all();

        /** @var Comment $comment */
        foreach ($comments as $comment) {

        }
    }
}
