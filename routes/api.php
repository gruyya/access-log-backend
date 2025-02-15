<?php

use App\Http\Controllers\Api\LoginController;
use App\Http\Controllers\Api\LogoutController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\EmployeeAccessLog\CreateEmployeeAccessLogController;

Route::post('/login', LoginController::class);

Route::middleware('auth:sanctum')->group(function () {
    Route::post('/employee-access-log', CreateEmployeeAccessLogController::class);
    Route::post('/logout', LogoutController::class);
});
