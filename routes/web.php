<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CategoryController;

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

Route::get('/', [App\Http\Controllers\BlogsController::class, 'index']);

Auth::routes();

Route::get('/blogs', [App\Http\Controllers\BlogsController::class, 'index'])->name('blogs');
Route::get('/blogs/create', [App\Http\Controllers\BlogsController::class, 'create'])->name('blogs.create');
Route::post('/blogs/store', [App\Http\Controllers\BlogsController::class, 'store'])->name('blogs.store');

//Trashed
Route::get('/blogs/trash', [App\Http\Controllers\BlogsController::class, 'trash'])->name('blogs.trash');
Route::get('/blogs/trash/{id}/restore', [App\Http\Controllers\BlogsController::class, 'restore'])->name('blogs.restore');
Route::get('/blogs/trash/{id}/permament-delete', [App\Http\Controllers\BlogsController::class, 'permamentDelete'])->name('blogs.permament-delete');


Route::get('/blogs/{id}', [App\Http\Controllers\BlogsController::class, 'show'])->name('blogs.show');
Route::get('/blogs/{id}/edit', [App\Http\Controllers\BlogsController::class, 'edit'])->name('blogs.edit');
Route::patch('/blogs/{id}/update', [App\Http\Controllers\BlogsController::class, 'update'])->name('blogs.update');
Route::delete('/blogs/{id}/delete', [App\Http\Controllers\BlogsController::class, 'delete'])->name('blogs.delete');

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/logout', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

//admin routes
Route::get('/admin',  [App\Http\Controllers\AdminController::class, 'index'])->name('admin.index');

//Route resource
Route::resource('/categories', CategoryController::class);
