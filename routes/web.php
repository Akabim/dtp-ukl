<?php

use App\Http\Controllers\GenreController;
use App\Http\Controllers\Perpus\PerpusStoreController;
use App\Http\Controllers\PerpusController;
use App\Http\Controllers\ProfileController;
use GuzzleHttp\Promise\Create;
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

// Route::get('/dashboard', function () {
//     return view('dashboard');
// })->middleware(['auth'])->name('dashboard');

// Route::get('dashboard/create', [PerpusController::class, 'create'])->name('perpus.create');
// Route::get('/dashboard', [PerpusController::class, 'index'])->name('perpus.index');
// Route::post('/dashboard', [PerpusController::class, 'store'])->name('perpus.store');
// Route::get('dashboard/{id}/edit', [PerpusController::class, 'edit'])->name('perpus.edit');
// Route::put('/dashboard/{id}', [PerpusController::class, 'update'])->name('perpus.update');
// Route::delete('dashboard/delete/{id}', [PerpusController::class, 'delete'])->name('perpus.delete');

Route::resource('/perpustakaan', PerpusController::class)->middleware('auth');
Route::resource('genre', GenreController::class)->middleware('auth');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
