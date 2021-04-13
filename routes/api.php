<?php

use App\Console\Commands\Albums;
use App\Console\Commands\Photos;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\PostController;
use App\Http\Controllers\Api\AlbumController;
use App\Http\Controllers\Api\CommentController;
Use App\Http\Controllers\Api\PhotoController;
use App\Http\Controllers\Api\TodoController;
use App\Http\Controllers\Api\UserController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('/posts', [PostController::class, 'index']);
Route::get('/users', [UserController::class, 'index']);
Route::get('/albums', [AlbumController::class, 'index']);
Route::get('/photos', [PhotoController::class, 'index']);
Route::get('/todos', [TodoController::class, 'index']);
Route::get('/comments', [CommentController::class, 'index']);


