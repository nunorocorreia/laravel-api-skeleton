<?php

use App\Http\Controllers\Api\V1\TicketController;
use Illuminate\Support\Facades\Route;


/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Now create something great!
|
*/

// https://localhost:8000/api/v1/tickets
// tickets
// users

// api/v1/{id}
Route::middleware('auth:sanctum')->apiResource('tickets', TicketController::class);



