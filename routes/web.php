<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TTSController;

Route::get('/', [TTSController::class, 'index'])->name('tts.index');
Route::post('/speak', [TTSController::class, 'speak'])->name('speak');