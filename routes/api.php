<?php

use App\Comment\Http\ShowController;
use Illuminate\Support\Facades\Route;

Route::get('comments', ShowController::class);
