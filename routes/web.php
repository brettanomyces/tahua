<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('transactions', ['transactions' => \App\Transaction::all()]);
});

Route::get('/import', function () {
    return view('import');
});

Route::post('/api/import', 'ImportController@import');

Route::get('/api/transactions', TransactionController::class . '@retrieveAll');
Route::post('/api/transactions', TransactionController::class . '@create');
Route::put('/api/transactions/{transactionId}', TransactionController::class . '@update');
Route::delete('/api/transactions/{transactionId}', TransactionController::class . '@delete');

Route::get('/api/transactions/{transactionId}/tags', TransactionController::class . '@retrieveAll');
Route::post('/api/transactions/{transactionId}/tags', TransactionController::class . '@create');
Route::put('/api/transactions/{transactionId}/tags/{tagId}', TransactionController::class . '@update');
Route::delete('/api/transactions/{transactionId}/tags/{tagId}', TransactionController::class . '@delete');

Route::get('/api/tags', TagController::class . '@index');
Route::post('/api/tags', TagController::class . '@create');
Route::put('/api/tags/{id}', TagController::class . '@update');
Route::delete('/api/tags/{id}', TagController::class . '@delete');
