<?php

use App\Http\Controllers\CompanyController;
use App\Http\Controllers\PersonController;
use App\Http\Controllers\PositionController;
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

Route::apiResource('companies', CompanyController::class);
Route::apiResource('people', PersonController::class);
Route::apiResource('positions', PositionController::class);
Route::get('available-positions', [PositionController::class, 'getAvailable']);
Route::patch('set-person-positions', [PositionController::class, 'setPerson']);
