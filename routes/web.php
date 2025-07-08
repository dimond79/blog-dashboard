<?php

use App\Http\Controllers\CategoryController;
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

    //post route starts here
    Route::get('/post', [PostController::class,'index'])->name('post.write');
    Route::post('/post',[PostController::class,'create'])->name('post.create');
    Route::get('/post/list', [PostController::class,'list'])->name('post.list');
    Route::get('/post/{slug}',[PostController::class, 'show'])->name('post.show');

    //category route
    Route::post('/category',[CategoryController::class,'create'])->name('category.create');



});

require __DIR__.'/auth.php';
