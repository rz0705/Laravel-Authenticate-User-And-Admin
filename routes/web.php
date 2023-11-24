<?php

use App\Http\Controllers\UsersController;
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

Route::get('/', function () {
    return view('welcome');
});

Route::controller(UsersController::class)->group(function () {
    Route::prefix('customer')->group(function () {
        Route::get('registration', [UsersController::class, 'customerregistration'])->name('customerregistration');
        Route::post('registration', [UsersController::class, 'customerregister'])->name('customerregister');
        Route::get('login', [UsersController::class, 'customerlogin'])->name('customerlogin');
        Route::post('login', [UsersController::class, 'customerlogincheck'])->name('customerlogincheck');
        Route::get('dashboard', [UsersController::class, 'customerdashboard'])->name('customerdashboard');
    });

    Route::prefix('admin')->group(function () {
        Route::get('registration', [UsersController::class, 'adminregistration'])->name('adminregistration');
        Route::post('registration', [UsersController::class, 'adminregister'])->name('adminregister');
        Route::get('login', [UsersController::class, 'adminlogin'])->name('adminlogin');
        Route::post('login', [UsersController::class, 'adminlogincheck'])->name('adminlogincheck');
        Route::get('dashboard', [UsersController::class, 'admindashboard'])->name('admindashboard');
    });

    // Route::prefix('customer')->group(function () {
    //     Route::get('/registration', function () {
    //         return view('customer.customerregistration');
    //     })->name('customer.registration');

    //     Route::get('/login', function () {
    //         return view('customer.customerlogin');
    //     })->name('customer.login');
    // });

    // Route::prefix('admin')->group(function () {
    //     Route::get('/registration', function () {
    //         return view('admin.adminregistration');
    //     })->name('admin.registration');

    //     Route::get('/login', function () {
    //         return view('admin.adminlogin');
    //     })->name('admin.login');
    // });

});
