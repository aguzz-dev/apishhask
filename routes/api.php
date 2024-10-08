<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

use App\Http\Controllers\AuthController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\AssetController;
use App\Http\Controllers\QuestionController;
use App\Http\Controllers\PublicPostController;

Route::post('/login', [AuthController::class, 'login']);
Route::post('/check-session', [AuthController::class, 'checkSession']);
Route::get('/destroy-session', [AuthController::class, 'logout']);

Route::post('/posts', [PostController::class, 'index']);
Route::post('/posts/create', [PostController::class, 'store']);
Route::put('/posts', [PostController::class, 'update']);
Route::delete('/posts', [PostController::class, 'destroy']);
Route::post('/posts/questions', [PostController::class, 'getPostByIdWithQuestions']);

Route::post('/user/create', [UserController::class, 'store']);
Route::put('/user/update', [UserController::class, 'update']);
Route::delete('/user/destroy', [UserController::class, 'destroy']);

Route::post('/change-password', [UserController::class, 'changePassword']);

Route::post('/share-post', [PublicPostController::class, 'makePublicPost']);
Route::post('/hide-post', [PublicPostController::class, 'makePrivatePost']);

Route::post('question/get', [QuestionController::class, 'getQuestionById']);
Route::post('/question', [QuestionController::class, 'getQuestionsByPostId']);
Route::post('/question/create', [QuestionController::class, 'store']);
Route::post('/question/create-web', [QuestionController::class, 'storeQuestionFromWeb']);
Route::post('/question/answer', [QuestionController::class, 'answerQuestion']);

Route::get('/assets', [AssetController::class, 'getAllAssets']);
Route::post('/assets/buy', [AssetController::class, 'buyAsset']);
Route::post('/assets/check', [AssetController::class, 'checkAssetExpired']);
Route::post('/assets/id', [AssetController::class, 'getUserAssetsByUserId']);
