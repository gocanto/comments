<?php

use App\Comment\Http\ShowController;
use App\Comment\Http\StoreController;
use Illuminate\Support\Facades\Route;

Route::get('comments', ShowController::class);
Route::post('comments', StoreController::class);
