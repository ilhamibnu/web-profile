<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\UserController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', [UserController::class, 'indexlanding']);
Route::get('/about', [UserController::class, 'indexlanding']);
Route::get('/blog', [PostController::class, 'indexpostlanding']);
Route::get('/detail-blog/{id}', [PostController::class, 'detailpostlanding']);

Route::get('/login', [AuthController::class, 'index'])->middleware('IsStay');

Route::get('/user', [UserController::class, 'indexadmin'])->middleware('IsLogin');
Route::get('/post', [PostController::class, 'indexadmin'])->middleware('IsLogin');

Route::post('/user-add', [UserController::class, 'store']);
Route::put('/user-update/{id}', [UserController::class, 'updateuser'])->middleware('IsLogin');
Route::delete('/user-delete/{id}', [UserController::class, 'destroy'])->middleware('IsLogin');

Route::post('/post-add', [PostController::class, 'store'])->middleware('IsLogin');
Route::put('/post-update/{id}', [PostController::class, 'updatepost'])->middleware('IsLogin');
Route::delete('/post-delete/{id}', [PostController::class, 'deletepost'])->middleware('IsLogin');

Route::post('/login', [AuthController::class, 'authenticate']);
Route::get('/logout', [AuthController::class, 'logout'])->middleware('IsLogin');
