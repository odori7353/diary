<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\CategoryController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
//use App\Http\Controllers\CommetController;
use App\Http\Controllers\CalendarController;

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::controller(PostController::class)->middleware(['auth'])->group(function(){
    Route::get('/', 'index')->name('index');
    Route::post('/posts', 'store')->name('store');
    Route::get('/posts/create', 'create')->name('create');
    Route::get('/posts/calendar', 'calendar')->name('calendar');
    //Route::post('/posts/comments', 'commentstore')->name('commentstore');
    Route::get('/posts/{post}', 'show')->name('show');
    Route::put('/posts/{post}', 'update')->name('update');
    Route::delete('/posts/{post}', 'delete')->name('delete');
    Route::get('/posts/{post}/edit', 'edit')->name('edit');
});  
//Route::get('get_events', [CalendarController::class, 'getEvents']);
Route::get('/categories/{category}', [CategoryController::class,'index'])->middleware("auth");
//Route::get('/posts/comments' ,[CommentController::class,'index'])->middleware("auth");
//Route::get('/posts/comments', function() {
//return view('posts/comments');
//viewヘルパはcontrollerやweb.phpからviewフォルダー内のファイルを表⽰したいときに使います。
//});
//Route::get('/posts/{comments}', [CommentController::class, 'commentstore'])->middleware("auth");

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    
    
});

Route::post('/like/{postId}',[LikeController::class,'store']);
Route::post('/unlike/{postId}',[LikeController::class,'destroy']);

Route::get('/user/{user}', [UserController::class,'index']);
//Route::get('//{user}', [UserController::class,'index']);

require __DIR__.'/auth.php';
