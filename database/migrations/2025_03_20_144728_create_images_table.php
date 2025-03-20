<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateImagesTable extends Migration
{
    public function up(): void
    {
        Schema::create('images', function (Blueprint $table) {
            $table->id(); // 主キー
            $table->string('title'); // 画像タイトル
            $table->text('description')->nullable(); // 説明文
            $table->string('file_path'); // 画像のパス
            $table->unsignedBigInteger('user_id'); // 投稿ユーザーID
            $table->timestamps(); // created_at, updated_at 自動追加
            $table->softDeletes(); // deleted_at（論理削除用）

            // ユーザーテーブルとの外部キー制約
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('images');
    }
}
