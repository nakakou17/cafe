<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <title>カフェ一覧画面</title>
        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">
    </head>
    <body>
        <h1>カフェ一覧画面</h1>
            <a href='/cafes/create'>新規追加</a>
            <div class='cafes'>
                @foreach ($cafes as $cafe)
                    <div class='cafe'>
                        <h2 class='name'>
                            <a href="/cafes/{{ $cafe->id }}">{{ $cafe->name }}</a>
                        </h2>
                        <p class='address'>{{ $cafe->address }}</p>
                    </div>
                @endforeach
            </div>
             <div class='paginate'>
                {{ $cafes->links() }}
            </div>
        {{auth()->user()->name}}
    </body>
</html>