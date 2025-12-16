<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\JurusanController;
use App\Http\Controllers\MahasiswaController;
use App\Http\Controllers\PhotoController;


Route::get('/',[JurusanController::class,'index'])->middleware('auth');
Route::resource('jurusans',JurusanController::class)->middleware('auth');
Auth::routes();
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Auth::routes();
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/daftar-mahasiswa', [MahasiswaController::class,'daftarMahasiswa'])->middleware('auth');
Route::get('/tabel-mahasiswa', [MahasiswaController::class,'tabelMahasiswa'])->middleware('auth');
Route::get('/blog-mahasiswa', [MahasiswaController::class,'blogMahasiswa'])->middleware('auth');

Route::middleware('auth')->group(function () {

    Route::get('/foto', [PhotoController::class, 'index'])->name('foto.index');
    Route::get('/foto/create', [PhotoController::class, 'create'])->name('foto.create');
    Route::post('/foto', [PhotoController::class, 'store'])->name('foto.store');

    Route::get('/foto/{photo}', [PhotoController::class, 'show'])->name('foto.show');
    Route::get('/foto/{photo}/edit', [PhotoController::class, 'edit'])->name('foto.edit');
    Route::patch('/foto/{photo}', [PhotoController::class, 'update'])->name('foto.update');
    Route::delete('/foto/{photo}', [PhotoController::class, 'destroy'])->name('foto.destroy');

});
