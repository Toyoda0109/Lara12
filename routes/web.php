<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ImageController;

Route::get('/', function () {
    return view('welcome');
});

Route::middleware('auth')->group(function () {
    Route::get('/member', [ImageController::class, 'index'])->name('member'); // 画像一覧表示
    Route::get('/upload', [ImageController::class, 'create'])->name('upload'); // 画像投稿フォーム
    Route::post('/upload', [ImageController::class, 'store'])->name('images.store'); // 画像投稿処理
    Route::delete('/images/{id}', [ImageController::class, 'destroy'])->name('images.destroy'); // 画像削除処理

    // プロフィール関係
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
