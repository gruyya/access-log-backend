<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\EmployeeAccessLog\CreateEmployeeAccessLogController;


    Route::post('/employee-access-logs', CreateEmployeeAccessLogController::class);
