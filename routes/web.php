<?php

use App\Http\Controllers\COntroller;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

// route: /hello
// method: GET

Route::get('/', function () {
    return view('welcome');
});

Route::get('/hello', function (){
    return 'Hello PWL-1 salam dari Alvalfa';
})->name('hello');


Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
