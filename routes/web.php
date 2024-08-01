<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\DashboardController;
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

// Route::get('/', function () {
//     return view('welcome');
// });


Route::controller(AuthController::class)->group(function () {
    Route::get('login', 'login')->name('login');

    Route::post('login', 'auth_login')->name('auth_login');

    Route::get('register', 'register')->name('register');
    Route::post('register', 'create_user')->name('create_user');

    Route::get('verify/{token}', 'verify');

    Route::get('logout', 'logout')->name('logout');
});



// Route::controller(CategoryControlle::class)->group(function () {
//     Route::middleware('admin_user')->group(function () {
//         Route::get('admin/category', 'category')->name('category');
//     });
// });
Route::middleware('adminuser')->group(function () {
    Route::get('admin/dashboard', [DashboardController::class, 'dashboard'])->name('dashboard');

    Route::get('admin/category', [CategoryController::class, 'category'])->name('category');
    // Route::get('panel/dashboard', 'dashboard')->name('dashboard');
});
