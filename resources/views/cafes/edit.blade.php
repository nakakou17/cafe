<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>カフェ編集画面</title>
        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
    </head>
    <body class="bg-light">
        <div class="container my-5">
            <div class="p-3 bg-white border">
                <h1 class="bg-secondary-subtle border border-dark p-3 text-center">編集画面</h1>
                <div class="content">
                    <form action="/cafes/{{ $cafe->id }}" method="POST">
                        @csrf
                        @method('PUT')
                        <div class='p-3 content__name'>
                            <h2>カフェの名前</h2>
                            <input type='text' name='cafe[name]' value="{{ $cafe->name }}">
                        </div>
                        <div class='p-3 content__address'>
                            <h2>住所</h2>
                            <textarea name="cafe[address]">{{ $cafe->address }}</textarea>
                        </div>
                        <div class='p-3 content__opening_hours'>
                            <h2>営業時間</h2>
                            <textarea name="cafe[opening_hours]">{{ $cafe->opening_hours }}</textarea>
                        </div>
                        <div class='p-3'>
                            <button type="submit" class="btn btn-primary">更新</button>
                        </div>
                    </form>
                </div>
                <div class="p-3 footer">
                    <a href="/cafes/{{ $cafe->id }}" class="btn btn-secondary">戻る</a>
                </div>
            </div>
        </div>
    </body>
</html>
