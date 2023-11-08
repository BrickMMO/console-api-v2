<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\AuthController;
use App\Http\Controllers\EmailController;

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

// Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//     return $request->user();
// });

Route::controller(AuthController::class)->group(function () {
    Route::post('login', 'login');
    Route::post('register', 'register');
    Route::post('logout', 'logout');
    Route::post('refresh', 'refresh');
    Route::post('test', 'test');
    Route::post('authenticated-test', 'authenticatedTest');
    Route::post('user', 'user');
    Route::get('users', 'getUsers');
    Route::post('addAdmin', 'addAdmin');
});

Route::controller(EmailController::class)->group(function () {
    Route::post('/email/send', 'send');
    Route::get('/email/send', 'send');
});