<?php

use App\Http\Controllers\Api\CommentController;
use App\Http\Controllers\Api\PostController;
use App\Http\Controllers\Api\UserController;
use App\Http\Controllers\Api\FriendController;
use App\Http\Controllers\Api\LikeController;
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


Route::group(['prefix' => 'v1'], function () {

    Route::post('login', [UserController::class, 'login']);
    Route::post('user', [UserController::class, 'register']);// create

    //Route::get('user/{id}',[UserController::class,'show']);
    Route::get('users', [UserController::class, 'index']);//read all users

    Route::group(['middleware' => 'auth:api'], function () {
        Route::get('user', [UserController::class, 'profile']);//read a user auth profile
        Route::post('logout', [UserController::class, 'logout']);//delete auth user

        //post routes
        Route::get('post', [PostController::class, 'index']);
        Route::get('post/{id}', [PostController::class, 'show']);
        Route::post('post', [PostController::class, 'store']);
        Route::delete('post/{id}', [PostController::class, 'destroy']);
        Route::put('post/{id}', [PostController::class, 'update']);

        //comment routes
        Route::get('comment/{id}', [CommentController::class, 'show']);
        Route::post('comment', [CommentController::class, 'store']);
        Route::delete('comment/{id}', [CommentController::class, 'destroy']);
        Route::put('comment/{id}', [CommentController::class, 'update']);

        Route::get('timeline', [PostController::class, 'timeline']);

        Route::post('friend', [FriendController::class, 'addOrRemoveFriend']);
        Route::post('like', [LikeController::class, 'likeOrDislike']);

    });

});
