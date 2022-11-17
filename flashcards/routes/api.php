<?php

use App\Http\Controllers\AnswerController;
use App\Http\Controllers\Auth\AuthController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ImageController;
use App\Http\Controllers\QuestionAnswerController;
use App\Http\Controllers\QuestionController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\UserQuestionController;
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

Route::post('/flashcards/register', [AuthController::class, 'register']);

Route::post('/flashcards/login', [AuthController::class, 'login']);

Route::group(['middleware' => ['auth:sanctum']], function () {
    Route::get('/flashcards/profile', function (Request $request) {
        return auth()->user();
    });
    Route::get('/flashcards/users', [UserController::class, 'index']);


    Route::post('/flashcards/logout', [AuthController::class, 'logout']);




//user routes
// Route::get('/flashcards/users', [UserController::class, 'index']);
Route::get('/flashcards/users/{user_id}', [UserController::class, 'show']);
Route::resource('flashcards/users', UserController::class)->only(['update', 'store', 'destroy']);



//categories routes
Route::get('flashcards/categories', [CategoryController::class, 'index']);
Route::get('flashcards/categories/{category_id}', [CategoryController::class, 'show']);
Route::resource('flashcards/categories', CategoryController::class)->only(['update', 'store', 'destroy']);

//images routes
Route::get('flashcards/images', [ImageController::class, 'index']);
Route::get('flashcards/images/{image_id}', [ImageController::class, 'show']);
Route::resource('flashcards/images', ImageController::class)->only(['update', 'store', 'destroy']);

//question routes
Route::get('flashcards/questions', [QuestionController::class, 'index']);
Route::get('flashcards/questions/{question_id}', [QuestionController::class, 'show']);
Route::resource('flashcards/questions', QuestionController::class)->only(['update', 'store', 'destroy']);



//answer routes
Route::get('flashcards/answers', [AnswerController::class, 'index']);
Route::get('flashcards/answers/{answer_id}', [AnswerController::class, 'show']);
Route::resource('flashcards/answers', AnswerController::class)->only(['update', 'store', 'destroy']);
Route::get('flashcards/question/{id}/answers', [QuestionAnswerController::class, 'index'])->name('question.answers.index');
Route::post('flashcards/add_question', [QuestionAnswerController::class, 'store']);


//user-post routes
Route::get('flashcards/users/{id}/questions', [UserQuestionController::class, 'index'])->name('users.questions.index');
// Route::resource('flashcards.users.questions', UserQuestionController::class)->only('index');


});

