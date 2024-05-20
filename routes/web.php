<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AlbumController;
Route::get('/', function () {
    return view('welcome');
});


Route::get('/albums', [AlbumController::class, 'index'])->name('albums.index');
Route::get('/albums/create', [AlbumController::class, 'create'])->name('albums.create');
Route::post('/albums', [AlbumController::class, 'store'])->name('albums.store');
Route::get('/albums/{album}', [AlbumController::class, 'show'])->name('albums.show');
Route::get('/albums/{album}/edit', [AlbumController::class, 'edit'])->name('albums.edit');
Route::put('/albums/{album}', [AlbumController::class, 'update'])->name('albums.update');
Route::delete('/albums/{album}', [AlbumController::class, 'destroy'])->name('albums.destroy');
Route::get('/albums/{album}/upload', [AlbumController::class, 'upload'])->name('albums.upload');
Route::post('/albums/{album}/pictures', [AlbumController::class, 'storePictures'])->name('albums.storePictures');
Route::post('/albums/{album}/destroy-options', [AlbumController::class, 'destroyWithOptions'])->name('albums.destroyWithOptions');
