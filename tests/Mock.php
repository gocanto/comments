<?php

declare(strict_types=1);

namespace Tests;

use JsonException;

class Mock
{
    /**
     * @throws JsonException
     */
    public static function comments(): array
    {
        $comments = file_get_contents(__DIR__ . '/__fixtures__/comments.json');

        return json_decode($comments, true, 512, JSON_THROW_ON_ERROR);
    }
}
