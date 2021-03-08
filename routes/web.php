<?php

use App\Http\Controllers\UrlController;
use Illuminate\Support\Facades\Route;



Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

require __DIR__ . '/auth.php';

// Rutas de mi aplicacion
Route::get('{code}', [UrlController::class, 'show']);
Route::post('url', [UrlController::class, 'store']);
