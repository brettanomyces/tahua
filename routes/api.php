<?php

use Illuminate\Http\Request;

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

Route::post('/upload', 'ImportController@upload');

Route::get('/transactions', TransactionController::class . '@retrieveAll');
Route::post('/transactions', TransactionController::class . '@create');
Route::get('/transactions/{transactionId}', TransactionController::class . '@retrieve');
Route::put('/transactions/{transactionId}', TransactionController::class . '@update');
Route::delete('/transactions/{transactionId}', TransactionController::class . '@delete');

Route::get('/transactions/{transactionId}/tags', TransactionController::class . '@retrieveAll');
Route::post('/transactions/{transactionId}/tags', TransactionController::class . '@create');
Route::put('/transactions/{transactionId}/tags/{tagId}', TransactionController::class . '@update');
Route::delete('/transactions/{transactionId}/tags/{tagId}', TransactionController::class . '@delete');

Route::get('/tags', TagController::class . '@retrieveAll');
Route::post('/tags', TagController::class . '@create');
Route::post('/tags/{tagId}', TagController::class . '@retrieve');
Route::put('/tags/{tagId}', TagController::class . '@update');
Route::delete('/tags/{tagId}', TagController::class . '@delete');
