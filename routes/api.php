<?php

use App\Http\Controllers\Api\AuthController;
use Illuminate\Support\Facades\Route;

// https://localhost:8000/api/v1/tickets
// tickets
// users

Route::post('/login', [AuthController::class, 'login']  );
Route::post('/register', [AuthController::class, 'register']  );
Route::middleware('auth:sanctum')->post('/logout', [AuthController::class, 'logout']  );



