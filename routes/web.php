<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\PeminjamanController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

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

Route::get('/', [HomeController::class, 'home']);

//peminjaman
Route::get('admin/peminjaman', [PeminjamanController::class, 'index']);
Route::post('admin/create-peminjaman', [PeminjamanController::class, 'store']);
Route::post('admin/edit-peminjaman', [PeminjamanController::class, 'update']);
Route::get('admin/delete-peminjaman/{id}', [PeminjamanController::class, 'delete']);

//user
Route::get('admin/user', [UserController::class, 'index']);
Route::post('admin/create-user', [UserController::class, 'store']);
Route::post('admin/edit-user', [UserController::class, 'update']);
Route::get('admin/delete-user/{id}', [UserController::class, 'delete']);

//login
Route::get('/login', [LoginController::class, 'formlogin'])->name('login');
Route::post('/login', [LoginController::class, 'login']);
Route::get('/logout', [LoginController::class, 'logout']);
