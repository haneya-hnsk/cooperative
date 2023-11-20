<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Authentication;
use App\Http\Controllers\Controller;
use App\Http\Controllers\NasabahController;
use App\Http\Controllers\RekeningController;
use App\Http\Controllers\TransaksiController;

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

Route::get('/', [Controller::class, 'dashboard']);
//->middleware('auth');

Route::get('login', [Authentication::class, 'index']);
Route::post('/login', [Authentication::class, 'login'])->name('login');;

route::post('/logout', [Authentication::class, 'logout']);
//->middleware('auth');

route::resource('/nasabah', NasabahController::class);
route::resource('/rekening', RekeningController::class);
route::resource('/transaksi', TransaksiController::class);


Route::get('archieve/nasabah', [NasabahController::class, 'archieve']);

Route::get('archieve/rekening', [RekeningController::class, 'archieve']);
Route::post('archieve/rekening/restore/{id}', [RekeningController::class, 'restore']);


Route::get('archieve/transaksi', [TransaksiController::class, 'archieve']);
Route::post('archieve/transaksi/restore/{id}', [TransaksiController::class, 'restore']);
