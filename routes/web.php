<?php

use App\Http\Controllers\PostController;
use Illuminate\Contracts\Auth\Access\Gate;
use Illuminate\Support\Facades\Route;

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

Route::get('/', function(){
    return redirect()->route('home');
});

Auth::routes();
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/view/{post}', [App\Http\Controllers\HomeController::class, 'view'])->name('view');
Route::middleware(['htmlSanitize','can:crud_permission'])->group(function(){
    Route::resource('posts',App\Http\Controllers\PostController::class);
    Route::resource('categories',App\Http\Controllers\CategoryController::class);
});
