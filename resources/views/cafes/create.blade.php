<!DOCTYPE HTML>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <title>カフェ登録画面</title>
    </head>
    <body>
        <h1>カフェ登録画面</h1>
        <form action="/cafes" method="POST">
            @csrf
            <div class="name">
                <h2>カフェの名前</h2>
                <input type="text" name="cafe[name]" placeholder="カフェの名前"  value="{{ old('cafe.name') }}"/>
                @if ($errors->has('cafe.name'))
                <p class="name__error" style="color:red">{{ $errors->first('cafe.name') }}</p>
                @endif
            </div>
            <div class="address">
                <h2>カフェの住所</h2>
                <textarea name="cafe[address]" placeholder="東京都千代田区千代田1-1">{{ old('cafe.address') }}</textarea>
                @if ($errors->has('cafe.address'))
                <p class="address__error" style="color:red">{{ $errors->first('cafe.address') }}</p>
                @endif
            </div>
            <div class="opening_hours">
                <h2>営業時間</h2>
                <textarea name="cafe[opening_hours]" placeholder="平日7:00 - 23:00土日8:00 - 21:00"value="{{ old('cafe.opening_hours') }}"></textarea></textarea>
                <p class="opening_hours__error" style="color:red">{{ $errors->first('cafe.opening_hours') }}</p>
            </div>
            <input type="submit" value="登録"/>
        </form>
        <div class="back">
            <a href="/">戻る</a>
        </div>
    </body>
</html>