<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\AuthorController;
use App\Http\Controllers\BookController;
use App\Http\Controllers\NewsLetterController;
// use App\Http\Middleware\LogApiRequest;
// use App\Http\Middleware\TransactionMiddleware;

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
Route::controller(AuthController::class)->group(function () {
    Route::post('login', 'login')->middleware('check');
    Route::post('register', 'register');
    Route::post('logout', 'logout');
    Route::post('refresh', 'refresh');

});

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::apiResource('author',AuthorController::class);
Route::apiResource('book',BookController::class);
Route::post('send',[NewsLetterController::class, 'send']);

// Route::middleware([LogApiRequests::class])->group(function () {
//     Route::apiResource('author',AuthorController::class);
//     Route::apiResource('book',BookController::class);
// });

Route::middleware([TransactionMiddleware::class])->group(function () {

});
