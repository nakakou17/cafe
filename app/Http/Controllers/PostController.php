<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\Cafe;
use Illuminate\Support\Facades\Auth;


class PostController extends Controller
{
    public function index(Post $post)//posts/index.blade.php使ってない??
    {
        return view('cafes.show')->with(['posts' => $post->getPaginateByLimit(3)]);
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

        $post = new Post();
        $post->cafe_id = $cafe->id;
        $post->user_id = auth()->id();
        $post->fill($validatedData['post']);
        $post->save();

        return redirect()->route('cafes.show', ['cafe' => $cafe->id]);
    }
    public function delete(Post $post)
    {
        //現在のユーザーが投稿の所有者でない場合はエラーを表示させる。
        if ($post->user_id !== Auth::id()) {
            abort(403, '投稿者以外は削除できません');
        }
        //口コミを削除する
        $cafeId = $post->cafe_id;
        $post->delete();
        return redirect('/cafes/' . $cafeId);
    }

}