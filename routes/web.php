<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\PeminjamanController;

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
Route::get('/home',[HomeController::class,'home']);
  //peminjaman
  Route::get('admin/peminjaman', [PeminjamanController::class, 'index']);
  Route::post('admin/create-peminjaman', [PeminjamanController::class, 'store']);
  Route::post('admin/edit-peminjaman', [PeminjamanController::class, 'update']);
  Route::get('admin/delete-peminjaman/{id}', [PeminjamanController::class, 'delete']);

  