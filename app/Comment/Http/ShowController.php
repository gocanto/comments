<?php

declare(strict_types=1);

namespace App\Comment\Http;

use App\Comment\Repository\CommentsRepository;
use Illuminate\Http\JsonResponse;

class ShowController
{
    private CommentsRepository $repository;

    public function __construct(CommentsRepository $repository)
    {
        $this->repository = $repository;
    }

    public function __invoke(): JsonResponse
    {
        $tree = $this->repository->getTree();

        return new JsonResponse($tree->toArray(), JsonResponse::HTTP_OK);
    }
}
