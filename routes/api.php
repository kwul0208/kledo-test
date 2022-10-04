<?php

use App\Http\Controllers\Controller;
use App\Http\Controllers\UserController;
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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::put('/settings', [Controller::class, 'settings']);

Route::post('/employees', [Controller::class, 'employees']);

Route::post('/overtimes', [Controller::class, 'overtimes']);

Route::get('/overtime-pays/calculate', [Controller::class, 'calculate']);
