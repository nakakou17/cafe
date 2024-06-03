<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CafeController;

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
});

Route::get('/', [CafeController::class, 'index'])->name('index');//認証機能の名前付きルート
//あとでPostコントローラーに変える

Route::get('cafes', [CafeController::class, 'index'])->name('cafes.index');
Route::get('/cafes/create', [CafeController::class, 'create']);
Route::get('/cafes/{cafe}', [CafeController::class, 'show']);
Route::post('/cafes', [CafeController::class, 'store']);



require __DIR__.'/auth.php';
