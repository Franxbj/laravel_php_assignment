<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TodoController;
use App\Http\Controllers\UserController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
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

// Route::view('/todo', 'todo')->name('todo')->middleware(['auth']);

    Route::get('/todo', [TodoController::class,'index'])->middleware('auth')->name('todo');
    // Route::view('/todo/new', 'todolists.form')->middleware('auth')->name('new-todo');

    Route::get('/todo/new', [TodoController::class, 'create'])->middleware('auth')->name('new-todo');
    Route::get('/todo/edit/{id}' , [TodoController::class, 'edit'])->middleware('auth');
    Route::post('/todo/update/{id}', [TodoController::class, 'update'])->middleware('auth');
    Route::get('/todo/view/{id}',[TodoController::class,'show'])->middleware(['auth']);
    Route::get('/todo/delete/{id}', [TodoController::class,'destroy'])->middleware(['auth']);
    Route::get('/user',[UserController::class,'index' ])->middleware(['auth'])->name('user');

    Route::post('/todo/create', [TodoController::class,'store'])->middleware(['auth']);

require __DIR__.'/auth.php';
