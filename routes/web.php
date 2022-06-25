<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\CityController;
use App\Http\Controllers\FavouriteController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\UserController;
use Illuminate\Auth\Events\PasswordReset;
use Illuminate\Foundation\Auth\EmailVerificationRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Password;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Str;

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

Route::middleware('guest')->group(function () {
    Route::get('/login', function () {
        return view('authorization');
    })->name('login');

    Route::post('/authorization', [AuthController::class, 'login'])->name('authorization');

    Route::get('/register', function () {
        return view('registration');
    })->name('register');

    Route::post('/registration', [AuthController::class, 'register'])->name('registration');

    Route::get('/forgot-password', function () {
        return view('auth.forgot-password');
    })->name('password.request');

    Route::post('/forgot-password', function (Request $request) {
        $request->validate(['email' => 'required|email']);

        $status = Password::sendResetLink(
            $request->only('email')
        );

        return $status === Password::RESET_LINK_SENT
            ? back()->with(['success' => __($status)])
            : back()->withErrors(['email' => __($status)]);
    })->name('password.email');

    Route::get('/reset-password/{token}', function ($token) {
        return view('auth.reset-password', ['token' => $token]);
    })->name('password.reset');

    Route::post('/reset-password', function (Request $request) {
        $request->validate([
            'token' => 'required',
            'email' => 'required|email',
            'password' => 'required|min:5|confirmed',
        ]);

        $status = Password::reset(
            $request->only('email', 'password', 'password_confirmation', 'token'),
            function ($user, $password) {
                $user->forceFill([
                    'password' => Hash::make($password)
                ]);

                $user->save();

                event(new PasswordReset($user));
            }
        );

        return $status === Password::PASSWORD_RESET
            ? redirect()->route('login')->with('success', __($status))
            : back()->withErrors(['email' => [__($status)]]);
    })->name('password.update');
});

Route::get('/email/verify', function () {
    return view('auth.verify-email');
})->middleware('auth')->name('verification.notice');

Route::get('/email/verify/{id}/{hash}', function (EmailVerificationRequest $request) {
    $request->fulfill();

    return redirect(route('index'));
})->middleware(['auth', 'signed'])->name('verification.verify');

Route::post('/email/verification-notification', function (Request $request) {
    $request->user()->sendEmailVerificationNotification();

    return back()->with('success', 'Письмо отправлено!');
})->middleware(['auth', 'throttle:6,1'])->name('verification.send');

Route::middleware('auth')->group(function () {
    Route::get('/logout', [AuthController::class, 'logout'])->name('exit');

    Route::middleware('verified')->group(function () {
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

        Route::get('/change-password', function () {
            return view('auth.change-password');
        })->name('password.edit');

        Route::post('/change-password', [UserController::class, 'changePassword'])->name('password.change');

        Route::middleware('role:admin')->prefix('a')->group(function () {
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
    });
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
