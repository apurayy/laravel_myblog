<?php

use App\Http\Controllers\Categorycontroller;
use App\Http\Controllers\FrontendController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\UsersController;
use Illuminate\Support\Facades\Route;
use Illuminate\support\Facades\Auth;


Route::get('/', [FrontendController::class, 'welcome'])->name('welcome');

Auth::routes();

Route::get('/home', [HomeController::class, 'index'])->name('home');

//Users
Route::get('/users',[UsersController::class, 'users'])->name('user');
Route::get('/users/delete/{user_id}',[UsersController::class, 'user_delete'])->name('user.delete');
Route::get('/edit/profile',[UsersController::class, 'edit_profile'])->name('profile.edit');
Route::post('/profile/update',[UsersController::class, 'profile_update'])->name('profile.update');
Route::post('/photo/update',[UsersController::class, 'photo_update'])->name('photo.update');

//category===============
Route::get('/category', [Categorycontroller::class, 'category'])->name('category');
Route::post('/category/store', [Categorycontroller::class, 'category_store'])->name('category.store');
Route::get('/category/delete{category_id}', [Categorycontroller::class, 'category_delete'])->name('category.del');
Route::get('/category/edit/{category_id}', [Categorycontroller::class, 'category_edit'])->name('category.edit');
Route::post('/category/update', [Categorycontroller::class, 'category_update'])->name('category.update');


//tag================
