<?php

use App\Http\Controllers\PostController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\UserController;
use App\Models\User;
use Illuminate\Support\Facades\Route;
use Spatie\FlareClient\View;


Route::get('/', function(){
    return redirect('/index');
});

Route::get('/index', [PostController::class, 'index'])->name('index');
Route::get('/create', [PostController::class, 'create'])->name('create');
Route::post('/store', [PostController::class, 'store'])->name('store');
Route::get('/show/{id}', [PostController::class, 'show'])->name('show');

Route::get('/edit/{id}', [PostController::class, 'edit'])->name('edit');
Route::patch('/update/{id}', [PostController::class, 'update'])->name('update');
Route::delete('/destroy/{id}', [PostController::class, 'destroy'])->name('destroy');

Route::get('/users/index', [UserController::class, 'index'])->name('users.index');



Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';

