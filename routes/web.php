<?php

use App\Http\Controllers\MainController;
use App\Http\Controllers\UserController;
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

Route::get('/register', [UserController::class, 'registerPage'])->name('registerPage')->middleware('guest');
Route::post('/register', [UserController::class, 'register'])->name('register')->middleware('guest');

Route::get('/login', [UserController::class, 'loginPage'])->name('loginPage')->middleware('guest');
Route::post('/login', [UserController::class, 'login'])->name('login')->middleware('guest');

Route::get('/logout', [UserController::class, 'logout'])->name('logout')->middleware('auth');

Route::get('/', [MainController::class, 'index'])->name('mainPage');

Route::get('/profile', [UserController::class, 'profile'])->name('profile')->middleware('auth');
Route::post('/profile/story', [MainController::class, 'publish'])->name('publish')->middleware('auth');
Route::post('/profile/draft', [MainController::class, 'draft'])->name('draft')->middleware('auth');
Route::post('/store', [MainController::class, 'store'])->name('store')->middleware('auth');
Route::get('/drafts', [MainController::class, 'draftPage'])->name('draftPage')->middleware('auth');
