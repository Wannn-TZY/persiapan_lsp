<?php
use App\Http\Controllers\LoginController;
use App\Http\Controllers\NilaiController;
use Illuminate\Support\Facades\Route;

Route::controller(LoginController::class)->group(function () {
    Route::get('/', 'index');
    Route::post('login-walas', [LoginController::class, 'loginWalas']);
    Route::post('login-siswa', [LoginController::class, 'loginSiswa']);
    Route::get('/dashboard', [LoginController::class, 'dashboard']);
    Route::get('/logout', [LoginController::class, 'logout']);
});


Route::middleware(['CheckUserRole:Walas'])->group(function () {
    Route::controller(NilaiController::class)->prefix('nilai-rapot')->group(function () {
        Route::get('/index', 'index');
        Route::get('/create', 'create');
        Route::post('/store', 'store');
        Route::get('/edit/{nilai}', 'edit');
        Route::put('/update/{nilai}', 'update');
        Route::get('/destroy/{nilai}', 'destroy');
        Route::get('/show/{id}', 'showSiswa');
        Route::get('/show', 'show');
    });
});
