@extends('layouts.app')

@section('content')
<div class="container">
    <h1>画像投稿</h1>

    <!-- 投稿フォーム -->
    <form action="{{ route('images.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div>
            <label for="title">タイトル</label>
            <input type="text" name="title" required>
        </div>

        <div>
            <label for="description">説明</label>
            <textarea name="description"></textarea>
        </div>

        <div>
            <label for="file">画像</label>
            <input type="file" name="file" required>
        </div>

        <div>
            <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded-lg">投稿する</button>
        </div>
    </form>
</div>
@endsection
