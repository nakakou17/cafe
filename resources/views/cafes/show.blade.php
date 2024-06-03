<!DOCTYPE HTML>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>カフェ編集画面</title>
        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">
    </head>
    <body>
        <h1 class="name">
            {{ $cafe->name }}
        </h1>
        <div class="content">
            <div class="content__post">
                <h3>住所</h3>
                <p>{{ $cafe->address }}</p>    
            </div>
        </div>
        <div class="edit">
            <a href="/cafes/{{ $cafe->id }}/edit">編集する</a>
        </div>
        <div class="footer">
            <a href="/cafes">戻る</a>
        </div>
    </body>
</html>