<?php

use App\Http\Controllers\BookController;
use App\Http\Controllers\ReadingIntervalController;
use Illuminate\Support\Facades\Route;

Route::post('/reading-interval', [ReadingIntervalController::class,'store']);
Route::get('/recommende-books', [BookController::class,'getRecommendedBooks']);