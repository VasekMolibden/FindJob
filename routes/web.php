<?php

use App\Http\Controllers\AccessController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\CityController;
use App\Http\Controllers\FavouriteController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\UserController;
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

Route::get('/', [PostController::class, 'index'])->name('index');

Route::middleware("guest")->group(function () {
    Route::get('/login', function () {
        return view('authorization');
    })->name('login');

    Route::post('/authorization', [AuthController::class, 'login'])->name('authorization');

    Route::get('/register', function () {
        return view('registration');
    })->name('register');

    Route::post('/registration', [AuthController::class, 'register'])->name('registration');

});

Route::middleware("auth")->group(function () {
    Route::get('/logout', [AuthController::class, 'logout'])->name('exit');

    Route::get('/create', [PostController::class, 'create'])->name('create')->middleware('can:create,App\Models\Post');
    Route::post('/creation', [PostController::class, 'store'])->name('addPost')->middleware('can:create,App\Models\Post');

    Route::delete('/post/{post}', [PostController::class, 'destroy'])->name('deletePost')->middleware('can:delete,post');
    Route::get('/post/{post}/edit', [PostController::class, 'edit'])->name('editPost')->middleware('can:update,post');
    Route::put('/post/{post}/edit', [PostController::class, 'update'])->name('updatePost')->middleware('can:update,post');

    Route::get('/favourites', [FavouriteController::class, 'index'])->name('favourites');
    Route::post('/post/{post}/favourite', [FavouriteController::class, 'store'])->name('addFavourite');
    Route::delete('/favourites/{favourite}', [FavouriteController::class, 'destroy'])->name('deleteFavourite');

    Route::delete('/profile/{user}', [UserController::class, 'destroy'])->name('deleteUser')->middleware('can:delete,user');
    Route::get('/profile/{user}/edit', [UserController::class, 'edit'])->name('editUser')->middleware('can:update,user');
    Route::put('/profile/{user}/edit', [UserController::class, 'update'])->name('updateUser')->middleware('can:update,user');
});

Route::get('/profile/{id}', [UserController::class, 'show'])->name('profile');

Route::get('/post/{id}', [PostController::class, 'show'])->name('post');

Route::get('/search', [PostController::class, 'search'])->name('search');

Route::post('/', [CityController::class, 'setCity'])->name('setCity');

Route::get('/about', function () {
    return view('about');
})->name('about');

Route::get('/user_agreement', function () {
    return view('user_agreement');
})->name('user_agreement');

Route::get('/help', function () {
    return view('help');
})->name('help');

Route::middleware(['auth', 'role:admin'])->prefix('a')->group(function () {
    Route::get('/', [\App\Http\Controllers\Admin\AdminController::class, 'index'])->name('indexAdmin');

    Route::resource('category', \App\Http\Controllers\Admin\CategoryController::class);
    Route::resource('city', \App\Http\Controllers\Admin\CityController::class);
    Route::resource('education', \App\Http\Controllers\Admin\EducationController::class);
    Route::resource('favourite', \App\Http\Controllers\Admin\FavouriteController::class);
    Route::resource('post', \App\Http\Controllers\Admin\PostController::class);
    Route::resource('post_type', \App\Http\Controllers\Admin\PostTypeController::class);
    Route::resource('region', \App\Http\Controllers\Admin\RegionController::class);
    Route::resource('role', \App\Http\Controllers\Admin\RoleController::class);
    Route::resource('user', \App\Http\Controllers\Admin\UserController::class);
    Route::resource('work_experience', \App\Http\Controllers\Admin\WorkExperienceController::class);
    Route::resource('work_schedule', \App\Http\Controllers\Admin\WorkScheduleController::class);
});
