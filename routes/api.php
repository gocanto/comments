<?php

use App\Comment\Http\ShowController;
use App\Comment\Http\StoreController;
use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Route;

Route::get('/', HomeController::class);
Route::get('comments', ShowController::class);
Route::post('comments', StoreController::class);
