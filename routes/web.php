<?php

use App\Http\Controllers\BlogCategoryController;
use App\Http\Controllers\BlogContentController;
use App\Http\Controllers\BlogController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\PostController;
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
    return view('home');
});

Route::get('/farmdigital', function() {
    return view('learnmore');
});

Route::get('blog', [BlogController::class, 'index']);
Route::get('/content/{post}', [BlogContentController::class, 'index']);

Route::middleware('auth')->post('blog', [PostController::class, 'store']);
Route::middleware('auth')->get('blog/category', [BlogCategoryController::class, 'index']);

Route::middleware('auth')->get('/admin/form', [PostController::class, 'index'])->name('form');

Route::post('login', [LoginController::class, 'store']);

Route::get('admin/login', function(){
    return view('login');
})->name('login');
