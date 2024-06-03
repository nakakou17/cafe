<!DOCTYPE HTML>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <title>カフェ登録画面</title>
    </head>
    <body>
        <h1>カフェ登録画面</h1>
        <form action="/posts" method="POST">
            @csrf
            <div class="name">
                <h2>名前</h2>
                <input type="text" name="cafe[name]" placeholder="カフェの名前"/>
            </div>
            <div class="address">
                <h2>住所</h2>
                <textarea name="cafe[address]" placeholder="東京都千代田区千代田1-1"></textarea>
            </div>
            <input type="submit" value="登録"/>
        </form>
        <div class="footer">
            <a href="/cafe">戻る</a>
        </div>
    </body>
</html>