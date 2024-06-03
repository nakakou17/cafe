<!DOCTYPE HTML>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <title>カフェ編集画面</title>
    </head>
    <body>
        <h1 class="title">編集画面</h1>
        <div class="content">
            <form action="/cafes/{{ $cafe->id }}" method="POST">
                @csrf
                @method('PUT')
                <div class='content__name'>
                    <h2>カフェの名前</h2>
                    <input type='text' name='cafe[name]' value="{{ $cafe->name }}">
                </div>
                <div class='content__address'>
                    <h2>住所</h2>
                    <input type='text' name='cafe[address]' value="{{ $cafe->address }}">
                </div>
                <input type="submit" value="更新">
            </form>
        </div>
        <div class="footer">
            <a href="/cafes/{{ $cafe->id }}">戻る</a>
        </div>
    </body>