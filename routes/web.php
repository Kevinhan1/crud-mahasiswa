<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MahasiswaController;

Route::resource('mahasiswa', MahasiswaController::class);

// Route untuk menampilkan form edit
Route::get('/mahasiswa/{id}/edit', [MahasiswaController::class, 'edit'])->name('mahasiswa.edit');

// Route untuk memproses form edit
Route::put('/mahasiswa/{id}', [MahasiswaController::class, 'update'])->name('mahasiswa.update');

Route::get('/', function () {
    return view('welcome');
});
