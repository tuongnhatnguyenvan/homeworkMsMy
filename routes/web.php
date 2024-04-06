<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;

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

Route::get('/', function () {
    return view('welcome');
});


Route::prefix('posts')->group(function () {
    Route::get('/', [PostController::class, 'index']);
    
    Route::get('/add', [PostController::class, 'create']);
    Route::post('/add', [PostController::class,'createPost'])->name('post.add');
    Route::get('/{id}', [PostController::class, 'getPostById']);
    Route::put('/update/{id}', [PostController::class, 'update'])->name('post.update');
    Route::get('/delete/{id}', [PostController::class, 'destroy']);
});
