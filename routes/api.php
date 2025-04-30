<?php

use App\Http\Controllers\AuthController;
use App\Models\Ticket;
use Illuminate\Support\Facades\Route;

// https://localhost:8000/api/v1/tickets
// tickets
// users

Route::post('/login', [AuthController::class, 'login']  );
Route::post('/register', [AuthController::class, 'register']  );



