<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UploadController;
use App\Http\Controllers\DisplayController;

Route::get('/', [DisplayController::class, 'index'])->name('image-index');
Route::delete('/delete/{folder}', [DisplayController::class, 'delete'])->name('image-delete');

Route::post('/upload', [UploadController::class, 'store'])->name('upload.store');
