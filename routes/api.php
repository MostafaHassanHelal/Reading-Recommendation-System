<?php

use App\Http\Controllers\ReadingIntervalController;
use Illuminate\Support\Facades\Route;

Route::post('/reading-interval', [ReadingIntervalController::class,'store']);