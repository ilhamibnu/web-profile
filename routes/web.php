<?php

use Illuminate\Support\Facades\Route;
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

// Route::get('/pengingat', [PengingatController::class, 'index'])->middleware('IsLogin');
// Route::post('/pengingat', [PengingatController::class, 'create'])->middleware('IsLogin');
// Route::put('/pengingat-update/{id}', [PengingatController::class, 'update'])->middleware('IsLogin');
// Route::delete('/pengingat-delete/{id}', [PengingatController::class, 'delete'])->middleware('IsLogin');


Route::get('/', [UserController::class, 'indexlanding']);
Route::get('/about', [UserController::class, 'indexlanding']);
Route::get('/blog', [PostController::class, 'indexpostlanding']);
Route::get('/detail-blog/{id}', [PostController::class, 'detailpostlanding']);
