<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ReviewController;
use App\Http\Controllers\FavController;

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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('/reviews', [ReviewController::class, 'index']);
Route::get('/users', [UserController::class, 'index']);
Route::get('/favorite', [FavController::class, 'index']);
Route::get('/posts', [PostController::class, 'index']);
Route::post('/create_post', [PostController::class, 'store']);
Route::delete('/delete_Post/{id}', [PostController::class, 'destroy']);
Route::post('/add_favorite', [FavController::class, 'store']);
Route::post('/delete_favorite', [FavController::class, 'destroy']);
Route::post('/getfav', [FavController::class, 'getFavByUserId']);
