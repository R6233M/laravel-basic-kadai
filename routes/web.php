<?php

use Illuminate\Support\Facades\Route;
// use宣言：ルーティングを設定するコントローラを宣言する
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

Route::get('/posts', [PostController::class, 'index']);

// 課題：データの作成機能とバリデーションを実装しよう
Route::get('/posts/create', [PostController::class, 'create']);

Route::post('/posts/store', [PostController::class, 'store'])->name('posts.store');

Route::get('/posts/{id}', [PostController::class, 'show']);