<?php

use App\Http\Controllers\Api\Cms\ModalController;
use App\Http\Controllers\Api\User\RoleController;
use App\Http\Controllers\Api\User\UserController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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

Route::post('login',[\App\Http\Controllers\Api\Auth\AuthController::class,'login']);
Route::post('register',[\App\Http\Controllers\Api\Auth\AuthController::class,'register']);
Route::post('test',[\App\Http\Controllers\Api\Auth\AuthController::class,'test']);
Route::get('todos',[\App\Http\Controllers\Api\TodoController::class,'index'])->middleware(['auth:api','can:create,\App\Models\Todo']);
Route::post('todos',[\App\Http\Controllers\Api\TodoController::class,'store'])->middleware(['auth:api','can:create,\App\Models\Todo']);;
Route::put('todo/{todo}',[\App\Http\Controllers\Api\TodoController::class,'update'])->middleware(['auth:api','can:update,todo']);
Route::get('todo/{todo}',[\App\Http\Controllers\Api\TodoController::class,'show'])->middleware(['auth:api','can:view,todo']);
Route::delete('todo/{todo}',[\App\Http\Controllers\Api\TodoController::class,'destroy'])->middleware(['auth:api','can:delete,todo']);;
