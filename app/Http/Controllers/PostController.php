<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\Cafe;

class PostController extends Controller
{
    public function index(Post $post)
    {
        return view('posts.index')->with(['posts' => $post->getPaginateByLimit(10)]);
    }
    public function store(Request $request, Cafe $cafe)
    {
        // バリデーション
        $validatedData = $request->validate([
            'post.recommend' => 'required|integer|between:1,5',
            'post.price' => 'required|numeric|min:0',
            'post.noisy' => 'required|integer|between:1,5',
            'post.time' => 'required|numeric|min:0.5',
            'post.body' => 'required|string|max:255',
        ]);

        // 新しいPostインスタンスの作成
        $post = new Post();
        $post->cafe_id = $cafe->id;
        $post->user_id = auth()->id();
        $post->fill($validatedData['post']);
        $post->save();

        return redirect()->route('cafes.show', ['cafe' => $cafe->id])->with('success', '口コミが登録されました！');
    }
}