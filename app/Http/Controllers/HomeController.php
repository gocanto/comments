<?php

namespace App\Http\Controllers;

use Illuminate\Http\JsonResponse;

class HomeController
{
    public function __invoke()
    {
        return new JsonResponse([], JsonResponse::HTTP_NO_CONTENT);
    }
}
