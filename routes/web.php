<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CafeController;
use App\Http\Controllers\PostController;

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


Route::get('/', [CafeController::class, 'index'])->name('index');


Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});


Route::get('cafes', [CafeController::class, 'index'])->name('cafes.index');
Route::get('/cafes/create', [CafeController::class, 'create'])->name('cafes.create');
Route::get('/cafes/{cafe}', [CafeController::class, 'show'])->name('cafes.show');
Route::post('/cafes', [CafeController::class, 'store']);
Route::get('/cafes/{cafe}/edit', [CafeController::class, 'edit']);
Route::post('/cafes/{cafe}/posts', [PostController::class, 'store']);
Route::put('/cafes/{cafe}', [CafeController::class, 'update']);
Route::delete('/cafes/{cafe}', [CafeController::class,'delete']);

Route::delete('/posts/{post}', [PostController::class,'delete']);
Route::get('/posts', [PostController::class, 'index']);

Route::get('/logout', function () {
    Auth::logout();
    return redirect('/');
});

require __DIR__.'/auth.php';
