<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminContoller;
use App\Http\Controllers\BlogController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\RegisController;
use App\Http\Controllers\DashboardController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

// ==================auth
Route::get('/register', [RegisController::class, 'index'])->name('register');
Route::post('/register', [RegisController::class, 'store'])->name('register.create');;



Route::get('/login', [LoginController::class, 'index'])->name('login')->middleware('guest');
// Route::get('/login', [LoginController::class, 'index'])->name('login');
Route::post('/login', [LoginController::class, 'authenticate']);
Route::post('/logout', [LoginController::class, 'logout'])->name('logout');
// ==================auth


// Route::get('/app', function () {
//     return view('layouts.app');
// });
// Route::get('/dashboard', function () {
//     return view('admin.dashboard.index');
// });
// Route::get('/admin', function () {
//     return view('admin.admin.index');
// });

Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard')->middleware('auth');



Route::get('admin', [AdminContoller::class, 'index'])->name('admin')->middleware('auth');
Route::post('admin/save', [AdminContoller::class, 'save_admin'])->name('admin.save')->middleware('auth');
Route::get('admin/delete/{id}', [AdminContoller::class, 'delete_admin'])->name('admin.delete')->middleware('auth');


Route::get('blog', [BlogController::class, 'index'])->name('blog')->middleware('auth');
Route::post('blog/save', [BlogController::class, 'save_blog'])->name('blog.save')->middleware('auth');
Route::get('blog/create', [BlogController::class, 'create_blog'])->name('blog.create')->middleware('auth');
Route::get('blog/edit/{id}', [BlogController::class, 'edit_blog'])->name('blog.edit')->middleware('auth');
Route::get('blog/delete/{id}', [BlogController::class, 'delete_blog'])->name('blog.delete')->middleware('auth');
// Route::get('lansia/delete/{id}', [LansiaController::class, 'delete'])->name('lansia.delete')->middleware('auth');



// Route::get('/blog', [BlogController::class, 'index'])->name('blog')->middleware('auth');

