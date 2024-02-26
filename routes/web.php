<?php

use App\Http\Controllers\ProfileController;
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

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

     // Nuevas rutas para la gestión de productos
     Route::get('/productos', 'ProductController@index')->name('productos.index');
     Route::get('/productos/create', 'ProductController@create')->name('productos.create');
     Route::post('/productos', 'ProductController@store')->name('productos.store');
     Route::get('/productos/{id}/edit', 'ProductController@edit')->name('productos.edit');
     Route::put('/productos/{id}', 'ProductController@update')->name('productos.update');
     Route::delete('/productos/{id}', 'ProductController@destroy')->name('productos.destroy');
});

require __DIR__.'/auth.php';
