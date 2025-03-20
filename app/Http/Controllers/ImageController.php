<?php

namespace App\Http\Controllers;

use App\Models\Image;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ImageController extends Controller
{
    // 画像一覧表示
    public function index()
    {
        $images = Image::latest()->get(); // 全画像取得
        return view('images.index', compact('images'));
    }

    // 画像投稿フォーム表示
    public function create()
    {
        return view('images.create');
    }

    public function destroy($id)
    {
        $image = Image::findOrFail($id);


        // アクセス制御: ログイン中のユーザーが所有者であるか確認
        if ($image->user_id !== auth()->id()) {
            abort(403, 'この画像を削除する権限がありません。');
        }

        // ストレージから画像を削除
        if (Storage::disk('public')->exists($image->file_path)) {
            Storage::disk('public')->delete($image->file_path);
        }

        // データベースから削除
        $image->delete();

        return redirect()->route('member')->with('success', '画像を削除しました');
    }

    // 画像投稿処理
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
            'file' => 'required|image|max:2048', // 2MBまで
        ]);

        // 画像保存処理
        $path = $request->file('file')->store('images', 'public');

        Image::create([
            'title' => $request->title,
            'description' => $request->description,
            'file_path' => $path,
            'user_id' => auth()->id(),
        ]);

        return redirect()->route('member')->with('success', '画像を投稿しました');
    }
}
