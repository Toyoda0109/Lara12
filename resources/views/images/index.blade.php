@extends('layouts.app')

@section('content')
<div class="container mx-auto mt-10">
    <h1 class="text-2xl font-bold mb-5">画像一覧</h1>

    <!-- 投稿ボタン -->
    <div class="mb-5">
        <a href="{{ route('upload') }}" class="bg-blue-500 text-white px-4 py-2 rounded-lg hover:bg-blue-700">画像を投稿する</a>
    </div>

    @if($images->isEmpty())
        <p>画像がありません。</p>
    @else
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-4">
            @foreach($images as $image)
                <div class="border rounded-lg p-4">
                    <h2 class="text-xl font-bold">{{ $image->title }}</h2>
                    <p>{{ $image->description }}</p>
                    <img src="{{ asset('storage/' . $image->file_path) }}" alt="{{ $image->title }}" class="w-full h-48 object-cover mt-2 rounded-lg">
                    
                    <form action="{{ route('images.destroy', $image->id) }}" method="POST" class="mt-4">
    @csrf
    @method('DELETE')
    <button type="submit">削除</button>
</form>
                </div>
            @endforeach
        </div>
    @endif
</div>
@endsection
