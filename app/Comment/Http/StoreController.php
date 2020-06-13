<?php

declare(strict_types=1);

namespace App\Comment\Http;

use App\Comment\Repository\CommentsRepository;
use Illuminate\Http\JsonResponse;

class StoreController
{
    private CommentsRepository $repository;

    public function __construct(CommentsRepository $repository)
    {
        $this->repository = $repository;
    }

    public function __invoke(StoreCommentRequest $request): JsonResponse
    {
        $comment = $this->repository->create(
            $request->getData()
        );

        return new JsonResponse($comment->toArray(), JsonResponse::HTTP_CREATED);
    }
}
