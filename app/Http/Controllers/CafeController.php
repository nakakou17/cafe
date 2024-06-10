<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Cafe;
use App\Http\Requests\CafeRequest; 

class CafeController extends Controller
{
    public function index(Cafe $cafe)
    {
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
    public function store(Cafe $cafe, CafeRequest $request)
    {
        $input = $request['cafe'];
        $cafe->fill($input)->save();
        return redirect('/cafes/' . $cafe->id);
    }
    public function delete(Cafe $cafe)
    {
        $cafe->delete();
        return redirect('/');
    }
    public function edit(Cafe $cafe)
    {
        return view('cafes.edit')->with(['cafe' => $cafe]);
    }
    public function update(CafeRequest $request, Cafe $cafe)
    {
        $input_cafe = $request['cafe'];
        $cafe->fill($input_cafe)->save();
    
        return redirect('/cafes/' . $cafe->id);
    }
    
}
