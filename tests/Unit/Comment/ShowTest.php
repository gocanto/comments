<?php

declare(strict_types=1);

namespace Tests\Unit\Comment;

use App\Comment\Http\ShowController;
use App\Comment\Repository\CommentsRepository;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Collection;
use JsonException;
use Mockery;
use PHPUnit\Framework\TestCase;
use Tests\Mock;

class ShowTest extends TestCase
{
    /**
     * @test
     * @throws JsonException
     */
    public function itReturnsValidComments(): void
    {
        $repo = Mockery::mock(CommentsRepository::class);
        $repo->shouldReceive('getTree')->once()->andReturn(Collection::make(Mock::comments()));

        $controller = new ShowController($repo);

        $response = $controller();

        $data = $response->getData(true);

        $this->assertCount(5, $data);
        $this->assertSame(JsonResponse::HTTP_OK, $response->getStatusCode());
    }
}
