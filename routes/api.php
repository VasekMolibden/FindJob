<?php

use App\Http\Controllers\AccessController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\CityController;
use App\Http\Controllers\EducationController;
use App\Http\Controllers\FavouriteController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\PostTypeController;
use App\Http\Controllers\ProfessionController;
use App\Http\Controllers\RegionController;
use App\Http\Controllers\WorkScheduleController;
use Illuminate\Foundation\Auth\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

//Аутентификация и выход
/*Route::post('/login', [UserController::class, 'login'])->withoutMiddleware('auth:api');
Route::get('/logout', [UserController::class, 'logout']);

Route::apiResource('user', UserController::class, ['only' => ['index', 'store', 'destroy', 'update']])->middleware('access:admin|moderator');

Route::prefix('user')->withoutMiddleware('auth:api')
    ->group(function () {
        Route::get('/{id}', [UserController::class, 'show']);
    });

Route::prefix('post')->middleware('access:admin|moderator')
    ->group(function () {
        Route::post('/store', [PostController::class, 'store']);
        //Route::get('/create', [PostController::class, 'create']); create i edit v web.php (eto formi) + dod prakt
        Route::patch('/{id}/update', [PostController::class, 'update']);
        //Route::get('/{id}/edit', [PostController::class, 'edit']);
        Route::delete('/{id}/destroy', [PostController::class, 'destroy']);
    });
Route::prefix('post')->withoutMiddleware('auth:api')
    ->group(function () {
        Route::get('/', [PostController::class, 'index']);
        Route::get('/{id}', [PostController::class, 'show']);
    });

Route::prefix('access')->middleware('access:admin')
    ->group(function () {
        Route::get('/', [AccessController::class, 'index']);
        Route::post('/store', [AccessController::class, 'store']);
        //Route::get('/create', [AccessController::class, 'create']);
        Route::get('/{id}', [AccessController::class, 'show']);
        Route::patch('/{id}/update', [AccessController::class, 'update']);
        //Route::get('/{id}/edit', [AccessController::class, 'edit']);
        Route::delete('/{id}/destroy', [AccessController::class, 'destroy']);
    });

Route::prefix('category')->middleware('access:admin')
    ->group(function () {
        Route::get('/', [CategoryController::class, 'index']);
        Route::post('/store', [CategoryController::class, 'store']);
        Route::get('/{id}', [CategoryController::class, 'show']);
        Route::patch('/{id}/update', [CategoryController::class, 'update']);
        Route::delete('/{id}/destroy', [CategoryController::class, 'destroy']);
    });

Route::prefix('city')->middleware('access:admin')
    ->group(function () {
        Route::get('/', [CityController::class, 'index']);
        Route::post('/store', [CityController::class, 'store']);
        Route::get('/{id}', [CityController::class, 'show']);
        Route::patch('/{id}/update', [CityController::class, 'update']);
        Route::delete('/{id}/destroy', [CityController::class, 'destroy']);
    });

Route::prefix('education')->middleware('access:admin')
    ->group(function () {
        Route::get('/', [EducationController::class, 'index']);
        Route::post('/store', [EducationController::class, 'store']);
        Route::get('/{id}', [EducationController::class, 'show']);
        Route::patch('/{id}/update', [EducationController::class, 'update']);
        Route::delete('/{id}/destroy', [EducationController::class, 'destroy']);
    });

Route::prefix('favourite')->middleware('access:admin')
    ->group(function () {
        Route::get('/', [FavouriteController::class, 'index']);
        Route::post('/store', [FavouriteController::class, 'store']);
        Route::get('/{id}', [FavouriteController::class, 'show']);
        Route::patch('/{id}/update', [FavouriteController::class, 'update']);
        Route::delete('/{id}/destroy', [FavouriteController::class, 'destroy']);
    });

Route::prefix('post-type')->middleware('access:admin')
    ->group(function () {
        Route::get('/', [PostTypeController::class, 'index']);
        Route::post('/store', [PostTypeController::class, 'store']);
        Route::get('/{id}', [PostTypeController::class, 'show']);
        Route::patch('/{id}/update', [PostTypeController::class, 'update']);
        Route::delete('/{id}/destroy', [PostTypeController::class, 'destroy']);
    });

Route::prefix('profession')->middleware('access:admin')
    ->group(function () {
        Route::get('/', [ProfessionController::class, 'index']);
        Route::post('/store', [ProfessionController::class, 'store']);
        Route::get('/{id}', [ProfessionController::class, 'show']);
        Route::patch('/{id}/update', [ProfessionController::class, 'update']);
        Route::delete('/{id}/destroy', [ProfessionController::class, 'destroy']);
    });

Route::prefix('region')->middleware('access:admin')
    ->group(function () {
        Route::get('/', [RegionController::class, 'index']);
        Route::post('/store', [RegionController::class, 'store']);
        Route::get('/{id}', [RegionController::class, 'show']);
        Route::patch('/{id}/update', [RegionController::class, 'update']);
        Route::delete('/{id}/destroy', [RegionController::class, 'destroy']);
    });

Route::prefix('work-schedule')->middleware('access:admin')
    ->group(function () {
        Route::get('/', [WorkScheduleController::class, 'index']);
        Route::post('/store', [WorkScheduleController::class, 'store']);
        Route::get('/{id}', [WorkScheduleController::class, 'show']);
        Route::patch('/{id}/update', [WorkScheduleController::class, 'update']);
        Route::delete('/{id}/destroy', [WorkScheduleController::class, 'destroy']);
    });*/
