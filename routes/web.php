<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\{
    PetugasController,
    SantriController,
    RegisterController,
    LoginController,
};

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

Route::get('/', [LoginController::class, 'index'])->name('login');
Route::post('/login', [LoginController::class, 'login']);
Route::post('/logout', [LoginController::class, 'logout']);

Route::get('/register', [RegisterController::class, 'index']);
Route::post('/register', [RegisterController::class, 'store']);

Route::get('/home', function () {
    return view('welcome');
});

Route::resource('petugas', PetugasController::class);
Route::resource('santri', SantriController::class);
