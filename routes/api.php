<?php
use Illuminate\Support\Facades\Route;

Route::middleware('api')->group(function () {
    Route::apiResource('projects', App\Http\Controllers\ProjectController::class);
    Route::apiResource('tasks', App\Http\Controllers\TaskController::class);
    Route::apiResource('comments', App\Http\Controllers\CommentController::class);
    Route::apiResource('files', App\Http\Controllers\FileController::class);
});
