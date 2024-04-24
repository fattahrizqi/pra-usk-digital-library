<?php

use App\Http\Controllers\BookController;
use App\Http\Controllers\BookingController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\LaporanController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;



/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/login', [LoginController::class, 'index']);
Route::post('/login', [LoginController::class, 'authenticate']);

Route::middleware('auth')->group(function () {
    Route::get('/', [DashboardController::class, 'index']);
    Route::get('/logout', [LoginController::class, 'logout']);

    // generate laporan
    Route::get('/laporan-peminjaman', [BookingController::class, 'generatePDF']);
});

Route::middleware(['auth', 'role:librarian,admin'])->group(function () {

    Route::resource('/booking', BookingController::class);

    Route::middleware(['auth', 'role:admin'])->group(function () {

        Route::resource('/category', CategoryController::class);
        Route::resource('/book', BookController::class);
        Route::resource('/user', UserController::class);
    });
});
