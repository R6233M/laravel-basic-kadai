<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Post;

class PostController extends Controller
{
    public function index() {
        $posts = DB::table('posts')->get();
        
        return view('posts.index', compact('posts'));
    }

    public function show($id) {
        $post = Post::findOrFail($id);

        return view('posts.show', compact('post'));
    }

    // 課題：データの作成機能とバリデーションを実装しよう
    // createアクション：投稿データの作成ページ（resources/views/posts/create.blade.phpファイル）を表示する
    public function create() {
        return view('posts.create');
    }

    // storeアクション
    public function store(Request $request) {
        // バリデーションの設定
        $request->validate([
            'title' => 'required|max:20',
            'content' => 'required|max:200',
        ]);

        // フォームの入力内容を基に、postsテーブルにデータを追加する
        $post = new Post();
        $post->title = $request->input('title');
        $post->content = $request->input('content');
        $post->save();

        // リダイレクトさせる
        return redirect()->route('posts.create');
    }
}
