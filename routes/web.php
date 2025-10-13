<?php

use App\Http\Controllers\ReportController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\ProfileController;

use Illuminate\Support\Facades\Route;

// Route::get('/', function () {
//     return view('welcome');
// });

# GET
Route::get('/', [ReportController::class, 'index'])->name('report.index');
Route::get('/detail/{id}', [ReportController::class, 'detail'])->name('report.detail');
Route::get('/write', [ReportController::class, 'write'])->name('report.write');
Route::get('/report_list', [ReportController::class, 'report_list'])->name('report.report_list');
Route::get('/edit/{id}', [ReportController::class, 'edit'])->name('report.edit');
Route::get('/search', [ReportController::class, 'search'])->name('report.search');
// Route::get('/foo', [ReportController::class, 'foo'])->name('report.foo');

# POST
Route::post('/report_post', [ReportController::class, 'store'])->name('report.post');
Route::post('/report_update', [ReportController::class, 'update'])->name('report.update');
Route::post('/comment_post', [CommentController::class, 'store'])->name('comment.post');
// Route::post('/foo', [ReportController::class, 'foo'])->name('report.post.foo');

# DELETE
Route::delete('/article_delete/{id}', [ReportController::class, 'delete'])->name('report.delete');
Route::delete('/comment_delete/{comment_id}/article/{article_id}', [CommentController::class, 'delete'])->name('comment.delete');

// Breeze auth
Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';