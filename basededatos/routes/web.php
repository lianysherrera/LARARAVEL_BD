<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\PageController;

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

Route::get('/', [PageController::class, 'home'])->name('home');

Route::get('categoria/{category}', [PageController::class, 'category'])->name('page.category');
Route::get('etiqueta/{tag}',       [PageController::class, 'tag'])->name('page.tag');
Route::get('hilo/{thread}',        [PageController::class, 'thread'])->name('page.thread');
