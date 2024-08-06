<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\BlogController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\HomeController;
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


Route::controller(HomeController::class)->group(function () {
    Route::get('/', 'index')->name('index');
    Route::get('/blog', 'blog')->name('blog');
    Route::get('/blog/{id}',  'show')->name('blog_detail');

    // Route::get('category/{id}', 'filterByCategory')->name('category.filter');
});


Route::controller(AuthController::class)->group(function () {
    Route::get('login', 'login')->name('login');

    Route::post('login', 'auth_login')->name('auth_login');

    Route::get('register', 'register')->name('register');
    Route::post('register', 'create_user')->name('create_user');

    Route::get('verify/{token}', 'verify');

    Route::get('logout', 'logout')->name('logout');
});




Route::group(['middleware' => 'adminuser'], function () {

    Route::get('admin/dashboard', [DashboardController::class, 'dashboard'])->name('dashboard');
    //users api
    Route::get('admin/user/list', [UserController::class, 'users'])->name('users.list');
    Route::get('admin/user/add', [UserController::class, 'add'])->name('users.add');
    Route::post('admin/user/add', [UserController::class, 'addPost'])->name('users.addPost');
    Route::get('admin/user/edit/{id}', [UserController::class, 'edit'])->name('users.edit');
    Route::post('admin/user/update', [UserController::class, 'user_update'])->name('users.update');
    Route::get('admin/user/delete/{id}', [UserController::class, 'delete'])->name('users.destroy');


    //category
    Route::get('admin/category/list', [CategoryController::class, 'index'])->name('category.list');
    Route::get('admin/category/add', [CategoryController::class, 'create'])->name('category.create');
    Route::post('admin/category/add', [CategoryController::class, 'store'])->name('category.store');
    Route::get('admin/category/edit/{id}', [CategoryController::class, 'edit'])->name('category.edit');
    Route::post('admin/category/update', [CategoryController::class, 'update'])->name('category.update');
    Route::delete('admin/category/delete/{id}', [CategoryController::class, 'destroy'])->name('category.destroy');

    //blog api
    Route::get('admin/blog/list', [BlogController::class, 'index'])->name('blog.list');
    Route::get('admin/blog/add', [BlogController::class, 'create'])->name('blog.create');
    Route::post('admin/blog/add', [BlogController::class, 'store'])->name('blog.store');
    Route::get('admin/blog/edit/{id}', [BlogController::class, 'edit'])->name('blog.edit');
    Route::post('admin/blog/update', [BlogController::class, 'update'])->name('blog.update');
    Route::delete('admin/blog/delete/{id}', [BlogController::class, 'destroy'])->name('blog.destroy');
});
