<?php

use App\Http\Controllers\Api\LoginController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\EmployeeAccessLog\CreateEmployeeAccessLogController;
use Illuminate\Http\Request;

Route::post('/login', LoginController::class);

Route::middleware('auth:sanctum')->group(function () {
    Route::get('/test', function () {
        return response()->json(['message' => 'Hello World!']);
    });
    Route::post('/employee-access-log', CreateEmployeeAccessLogController::class);
});
