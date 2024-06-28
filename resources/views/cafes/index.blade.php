<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>カフェ一覧画面</title>
        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
    </head>
    <body class="bg-light">
        <div class="container my-5">
            <div class="p-3 bg-white border">
                <h1 class="bg-secondary-subtle border border-dark p-3 text-center">カフェ一覧画面</h1>
                
                <div class="my-3">
                    <a href='/cafes/create' class="btn btn-primary">新しいカフェを追加する</a>
                </div>
                
                <tr>
                    <th class="px-3"><a href='/?sort=recommend' class="btn btn-link">おすすめ順</a></th>
                    <th class="px-3"><a href='/?sort=noisy' class="btn btn-link">静かさ順</a></th>
                    <th class="px-3"><a href='/?sort=time' class="btn btn-link">滞在時間順</a></th>
                </tr>

                
                <div class='cafes'>
                    @foreach ($cafes as $cafe)
                        <div class='cafe p-3 mb-3 bg-light border'>
                            <h2 class='name'>
                                <a href="/cafes/{{ $cafe->id }}">{{ $cafe->name }}</a>
                            </h2>
                            <p class='address'>住所：{{ $cafe->address }}</p>
                            <p class='opening_hours'>営業時間：{{ $cafe->opening_hours }}</p>
                            <p class='avg_recommend_value'>平均おすすめ度：{{ number_format($cafe->avg_recommend_value, 1 ) }}</p>
                            <p class='avg_noisy_value'>平均ガヤガヤ度：{{ number_format($cafe->avg_noisy_value, 1 ) }}</p>
                            <p class='avg_time_value'>平均滞在時間：{{ number_format($cafe->avg_time_value, 1 ) }}</p>
                            
                            <form action="/cafes/{{ $cafe->id }}" id="form_{{ $cafe->id }}" method="post">
                                @csrf
                                @method('DELETE')
                                <button type="button" onclick="deletePost({{ $cafe->id }})" class="btn btn-danger">削除</button> 
                            </form>
                        </div>
                    @endforeach
                </div>
                 <div class='paginate'>
                    {{ $cafes->links() }}
                </div>
                <script>
                    function deletePost(id) {
                        'use strict'
                
                        if (confirm('削除すると復元できません。\n本当に削除しますか？')) {
                            document.getElementById(`form_${id}`).submit();
                        }
                    }
                </script>
                    @auth
                    <p>ユーザー名：{{ auth()->user()->name }}</p>
                    <a href="/logout">logout</a>
                    @else
                    <a href="/login">login</a>
                    <a href="/register">register</a>
                    @endauth
            </div>
        </div>
    </body>
</html>
