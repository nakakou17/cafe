<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Cafe;

class CafeController extends Controller
{
    public function index(Cafe $cafe)
    {
        $cafes = Cafe::all();   //すべてのカフェを取得して表示
        return view('cafes.index')->with(['cafes' => $cafe->getPaginateByLimit(10)]);  //ビューにデータを渡す  
        //10件ごとにページネーションさせる
    }   
    public function show(Cafe $cafe)
    {
        return view('cafes.show')->with(['cafe' => $cafe]);
         //'cafe'はbladeファイルで使う変数。中身は$cafeはid=1のCafeインスタンス。
    }
    public function create()//カフェ登録画面の呼び出し
    {
        return view('cafes.create');
    }
    public function store(Request $request, Cafe $cafe)//投稿作成処理用のコントローラー実装
    {
        $input = $request['cafe'];
        $post->fill($input)->save();
        return redirect('/cafes/' . $post->id);
    }
}
