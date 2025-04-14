<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ApiController;

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
Route::get('/ping', [ApiController::class, 'ping']);
Route::get('/ipinfo', [ApiController::class, 'ipinfo']);
Route::get('/ipdb', [ApiController::class, 'ipdb']);
Route::post('/webhook', [ApiController::class, 'webhook']);
