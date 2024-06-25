<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Cafe;
use App\Http\Requests\CafeRequest;
use Illuminate\Support\Facades\DB;

class CafeController extends Controller
{
    public function index(Cafe $cafe, Request $request)
    {
        //クエリパラメータからsort対象の値を取得
        $sort_value = $request->input('sort');
        
        //通常はrecommend順にする
        if (is_null($sort_value)) {
            $sort_value = 'recommend';
        }
        
        // デフォルトは降順
        $sort_order = 'desc';
    
        // もしsort_valueが noisy の場合は昇順にする
        if ($sort_value === 'noisy') {
            $sort_order = 'asc';
        }
        
        $cafes=Cafe::withCount([
            'posts AS avg_sort_value' => function ($query) use ($sort_value) {
              $query->select(DB::raw("Avg({$sort_value}) as avg_sort_value"));
            }
            ])->orderBy('avg_sort_value', $sort_order)->paginate(10);
        
        return view('cafes.index')->with(['cafes' => $cafes]);
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
