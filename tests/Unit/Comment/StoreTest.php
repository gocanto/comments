<?php

declare(strict_types=1);

namespace Tests\Unit\Comment;

use App\Comment\Comment;
use App\Comment\Http\StoreCommentRequest;
use App\Comment\Http\StoreController;
use App\Comment\Repository\CommentsRepository;
use Illuminate\Http\JsonResponse;
use JsonException;
use Mockery;
use PHPUnit\Framework\TestCase;
use Tests\Mock;

class StoreTest extends TestCase
{
    /**
     * @test
     * @throws JsonException
     */
    public function itProperlyCreatesNewComments(): void
    {
        $stub = Mock::comments()[0];

        $comment = Mockery::mock(Comment::class);
        $comment->shouldReceive('toArray')->once()->andReturn($stub);

        $repo = Mockery::mock(CommentsRepository::class);
        $repo->shouldReceive('create')->once()->andReturn($comment);

        $controller = new StoreController($repo);

        $response = $controller($this->getRequest([
            'body' => 'foo',
            'parent_id' => 1,
        ]));

        $this->assertEquals($stub, $response->getData(true));
        $this->assertSame(JsonResponse::HTTP_CREATED, $response->getStatusCode());
    }

    private function getRequest(array $data = []): StoreCommentRequest
    {
        return StoreCommentRequest::create('foo', 'POST', $data);
    }
}
