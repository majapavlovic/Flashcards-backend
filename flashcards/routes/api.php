<?php

use App\Http\Controllers\CategoryController;
use App\Http\Controllers\UserController;
use App\Http\Resources\UserResource;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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

// Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//     return $request->user();
// });

// Route::get('/users', [UserController::class, 'index']);

Route::get('/flashcards/users', [UserController::class, 'index']);
Route::get('/flashcards/users/{user_id}', [UserController::class, 'show']);

Route::get('flashcards/categories', [CategoryController::class, 'index']);
Route::get('flashcards/categories/{category_id}', [CategoryController::class, 'show']);

Route::resource('flashcards/categories', CategoryController::class)->only(['update', 'store', 'destroy']);



