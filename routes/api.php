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

Route::post('/import', 'ImportController@import');

Route::get('/transactions', TransactionController::class . '@retrieveAll');
Route::post('/transactions', TransactionController::class . '@create');
Route::get('/transactions/{transactionId}', TransactionController::class . '@retrieve');
Route::put('/transactions/{transactionId}', TransactionController::class . '@update');
Route::delete('/transactions/{transactionId}', TransactionController::class . '@delete');

Route::get('/transactions/{transactionId}/tags', TransactionController::class . '@retrieveAll');
Route::post('/transactions/{transactionId}/tags', TransactionController::class . '@create');
Route::put('/transactions/{transactionId}/tags/{tagId}', TransactionController::class . '@update');
Route::delete('/transactions/{transactionId}/tags/{tagId}', TransactionController::class . '@delete');

Route::get('/tags', TagController::class . '@index');
Route::post('/tags', TagController::class . '@create');
Route::put('/tags/{id}', TagController::class . '@update');
Route::delete('/tags/{id}', TagController::class . '@delete');
