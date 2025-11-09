<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\KucingController;

Route::get('/kucing', [KucingController::class, 'index'])->name('kucing.index');
Route::get('/kucing/{id}', [KucingController::class, 'show'])->name('kucing.show');
