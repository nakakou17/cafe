<!DOCTYPE HTML>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>カフェ登録画面</title>
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
    </head>
    <body class="bg-light">
        <div class="container px-4">
            <div class="row gx-5">
                <div class="col">
                    <div class="p-3 bg-white border">
                        
                        <h1 class="bg-light text-dark border border-dark p-3 text-center">カフェ登録画面</h1>
                        <form action="/cafes" method="POST">
                            @csrf
                            <div class="mb-3">
                                <h2>カフェの名前</h2>
                                    <input type="text" name="cafe[name]" class="form-control" placeholder="カフェの名前"  value="{{ old('cafe.name') }}"/>
                                    @if ($errors->has('cafe.name'))
                                        <p class="text-danger">{{ $errors->first('cafe.name') }}</p>
                                    @endif
                            </div>
                            <div class="mb-3">
                                <h2>カフェの住所</h2>
                                    <textarea name="cafe[address]" class="form-control" placeholder="東京都千代田区千代田1-1">{{ old('cafe.address') }}</textarea>
                                    @if ($errors->has('cafe.address'))
                                        <p class="text-danger">{{ $errors->first('cafe.address') }}</p>
                                    @endif
                            </div>
                            <div class="mb-3">
                                <h2>営業時間</h2>
                                    <textarea name="cafe[opening_hours]" class="form-control" placeholder="平日7:00 - 23:00&#10;土日8:00 - 21:00">{{ old('cafe.opening_hours') }}</textarea>
                                    @if ($errors->has('cafe.opening_hours'))
                                        <p class="text-danger">{{ $errors->first('cafe.opening_hours') }}</p>
                                    @endif
                            </div>
                            
                            <input type="submit" value="登録" class="btn btn-primary"/>
                        </form>
                        <div class="mt-3">
                            <a href="/" class="btn btn-secondary">戻る</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </body>
</html>
