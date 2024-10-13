<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\SessionController;
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

Route::middleware(['guest'])->group(function () {

    Route::get('/', function () {
        return view('index');
    });

    Route::get('login', [SessionController::class, 'index'])->name('session.login');

    Route::post('login', [SessionController::class, 'login'])->name('login');

    Route::get('/register', function () {
        return view('session.register');
    })->name('session.register');
});

Route::middleware(['auth', 'user_guru'])->group(function () {

    Route::post('logout', [SessionController::class, 'logout'])->name('logout');

    Route::post('simpansoal', [AdminController::class, 'store'])->name('simpansoal');

    Route::get('datapppk', [AdminController::class, 'datapppk'])->name('datapppk');

    Route::get('soal', [UsersController::class, 'soal'])->name('soal');

    Route::post('store-jawaban', [UsersController::class, 'store'])->name('store-jawaban');

    Route::post('/update-answer-status', 'UsersController@updateAnswerStatus');

    Route::get('selesai', [UsersController::class, 'selesai'])->name('selesai');

    Route::get('/dashboard', function () {
        return view('admin.layouts.dashboard');
    })->name('dashboard');

    Route::get('/tambah-soal', function () {
        return view('admin.layouts.tambah-soal');
    })->name('tambah-soal');

    Route::get('/beranda', function () {
        return view('layouts.beranda');
    })->name('beranda');

    Route::get('hasil', function () {
        return view('layouts.hasil');
    })->name('hasil');

    Route::get('/get-kunci-jawaban/{idSoal}', 'PppkController@getKunciJawaban');

    Route::get('edit-soal/{id}', [AdminController::class, 'edit'])->name('edit-soal');

    Route::post('update-soal/{id}', [AdminController::class, 'update'])->name('update-soal');

    Route::get('delete-soal/{id}', [AdminController::class, 'destroy'])->name('delete-soal');

    // Route::get('/soal', function () {
    //     return view('layouts.soal');
    // })->name('soal');


    Route::get('/table', function () {
        return view('layouts.table');
    })->name('table');

    // Route::middleware(['auth', 'user_guru'])->group(function () {
    //     // Route::get('soal-teknis', [UsersController::class, 'soalTeknis'])->name('soal-teknis');
    //     Route::get('soal', [UsersController::class, 'soal'])->name('soal');
    // });
});
