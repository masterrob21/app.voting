<?php

use App\Http\Controllers\Ec_OfficialController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\Voter_RegisterController;
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



Route::get('ec', [Ec_OfficialController::class, 'index'])->name('ec.index');

Route::get('/voters', [Voter_RegisterController::class, 'index'])->name('voters.index');
Route::get('/voter', [Voter_RegisterController::class, 'create'])->name('voter.create');
Route::post('/voter/{id}', [Voter_RegisterController::class, 'store'])->name('voter.store');
Route::delete('/voter/{id}/delete', [Voter_RegisterController::class, 'destroy'])->name('voter.destroy');

Route::middleware('auth')->group(function(){
    Route::get('user/{id}', [UserController::class, 'update'])->name('user.resetpass');
    Route::get('/users', [UserController::class, 'index'])->name('users');
    Route::get('/user', [UserController::class, 'create'])->name('user.create');
    Route::post('/user', [UserController::class, 'store'])->name('user.store');
});


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

require __DIR__.'/auth.php';