<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;

use App\Http\Controllers\Api\TestController;

// API Learning
Route::post('/api_test', [TestController::class, 'index']);