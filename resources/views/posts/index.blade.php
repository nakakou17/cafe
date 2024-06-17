<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <title>口コミ一覧</title>
        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">
    </head>
    <body>
        <h1>勉強しやすいカフェの口コミ一覧</h1>
        <div class='posts'>

            @foreach ($posts as $post)
                <div class='post'>
                    <h2 class='name'>{{ $post->cafe->name }}</h2>
                    <p class='recommend'>{{ $post->recommend }}</p>
                    <p class='price'>{{ $post->price }}</p>
                    <p class='noisy'>{{ $post->noisy }}</p>
                    <p class='time'>{{ $post->time }}</p>
                    <p class='updated_at'>{{ $post->updated_at }}</p>
                    <p class='body'>{{ $post->body }}</p>
                    
                </div>
            @endforeach
        </div>
        <div class='paginate'>
            {{ $posts->links() }}
        </div>
    </body>
</html>

