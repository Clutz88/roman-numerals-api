<?php

use App\Http\Controllers\Numerals\ConvertNumberController;
use App\Http\Controllers\Numerals\LatestNumeralsController;
use App\Http\Controllers\Numerals\TopNumeralsController;
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

Route::post('numerals/convert', ConvertNumberController::class);
Route::get('numerals/latest', LatestNumeralsController::class);
Route::get('numerals/top', TopNumeralsController::class);
