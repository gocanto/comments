<?php

declare(strict_types=1);

namespace App\Comment\Repository;

use App\Comment\Comment;
use Illuminate\Support\Collection;

class CommentsRepository
{
    public function getTree(int $limit = 50): Collection
    {
        return Comment::with('tree')->whereNull('parent_id')->take($limit)->get();
    }

    public function create(array $attributes): Comment
    {
        return Comment::create($attributes);
    }
}
