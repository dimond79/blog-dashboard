<?php

use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\frontend\HomeController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    //profile route starts here
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::post('/profile', [ProfileController::class,'create'])->name('profile.create');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    Route::get('/profile/show',[ProfileController::class, 'show'])->name('profile.show');
    Route::post('/profile/delete',[ProfileController::class, 'delete'])->name('profile.delete');
    Route::get('/edit/profile',[ProfileController::class, 'editProfile'])->name('prfile1.edit');
    Route::put('/edit/profile',[ProfileController::class, 'updateProfile'])->name('profile1.update');

    //post route starts here
    Route::get('/post', [PostController::class,'index'])->name('post.write');
    Route::post('/post',[PostController::class,'create'])->name('post.create');
    Route::get('/post/list', [PostController::class,'list'])->name('post.list');
    Route::get('edit/post',[PostController::class,'edit'])->name('post.edit');


    //category route
    Route::post('/category',[CategoryController::class,'create'])->name('category.create');





});
 //frontend route

    Route::get('/home',[HomeController::class,'index'])->name('home.page');
    Route::get('/contact',[HomeController::class,'contact'])->name('contact');

    //post route
    Route::get('/post/{slug}',[PostController::class, 'show'])->name('post.show');

    //contact route
    Route::post('/contact',[ContactController::class, 'form'])->name('contact.form');

require __DIR__.'/auth.php';
