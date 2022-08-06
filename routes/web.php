<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\CheckoutController;
use App\Http\Controllers\PelangganController;
use App\Http\Controllers\TransaksiController;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

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

Route::get('/', fn () => redirect()->route('layanan'))
// Route::get('/', fn () => Inertia::render('Home/Index'))
    ->middleware('auth')
    ->name('home');

Route::get('/login', [AuthController::class, 'login'])
    ->middleware('guest')
    ->name('login');
Route::post('/login', [AuthController::class, 'authenticate']);

Route::get('/logout', fn () => redirect()->route('home'));
Route::post('/logout', [AuthController::class, 'logout'])
    ->middleware('auth')
    ->name('logout');

Route::get('/layanan', [CheckoutController::class, 'index'])
    ->middleware('auth')
    ->name('layanan');

Route::get('/checkout', [CheckoutController::class, 'checkout'])
    ->middleware('auth')
    ->name('checkout');

Route::post('/checkout/create', [CheckoutController::class, 'create'])
    ->middleware('auth')
    ->name('checkout/create');

Route::get('/transaksi', [TransaksiController::class, 'index'])
    ->middleware('auth')
    ->name('transaksi');

// Pelanggan
Route::get('/pelanggan', [PelangganController::class, 'index'])
    ->middleware('auth')
    ->name('pelanggan');

Route::post('/pelanggan/create', [PelangganController::class, 'create'])
    ->middleware('auth')
    ->name('pelanggan/create');