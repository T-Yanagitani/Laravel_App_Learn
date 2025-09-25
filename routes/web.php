<?php

use App\Http\Controllers\ReportController;
use App\Http\Controllers\CommentController;
use Illuminate\Support\Facades\Route;

// Route::get('/', function () {
//     return view('welcome');
// });

# GET
Route::get('/', [ReportController::class, 'index'])->name('report.index');
Route::get('/detail/{id}', [ReportController::class, 'detail'])->name('report.detail');
Route::get('/foo', [ReportController::class, 'foo'])->name('report.foo');

# POST
Route::post('/report_post', [ReportController::class, 'store'])->name('report.post');
Route::post('/comment_post', [CommentController::class, 'store'])->name('comment.post');
// Route::post('/foo', [ReportController::class, 'foo'])->name('report.post.foo');
