<?php

use App\Http\Controllers\Barrack\CreateBarrackController;
use App\Http\Controllers\Barrack\StoreBarrackController;
use App\Http\Controllers\Barrack\GetBarracksListController;
use App\Http\Controllers\Employee\CreateEmployeeController;
use App\Http\Controllers\Employee\GetEmployeesListController;
use App\Http\Controllers\Employee\StoreEmployeeController;
use App\Http\Controllers\ProfileController;
use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

Route::get('/', function () {
    return Inertia::render('Welcome', [
        'canLogin' => Route::has('login'),
        'canRegister' => Route::has('register'),
        'laravelVersion' => Application::VERSION,
        'phpVersion' => PHP_VERSION,
    ]);
});

Route::get('/dashboard', function () {
    return Inertia::render('Dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

   

    Route::prefix('employees')->group(function () {
        Route::get('/', GetEmployeesListController::class)->name('employees.list');
        Route::get('/create', CreateEmployeeController::class)->name('employees.create');
        Route::post('/', StoreEmployeeController::class)->name('employees.store');
    });

    Route::prefix('barracks')->group(function () {
        Route::get('/create', CreateBarrackController::class)->name('barracks.create');
        Route::post('/', StoreBarrackController::class)->name('barracks.store');
        Route::get('/', GetBarracksListController::class)->name('barracks.list');
    });    
});

require __DIR__.'/auth.php';
