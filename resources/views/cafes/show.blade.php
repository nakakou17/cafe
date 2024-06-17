<!DOCTYPE HTML>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>カフェ詳細画面</title>
        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">
    </head>
    <body>
        <h1 class="name">{{ $cafe->name }}</h1>
        <div class="content">
            <div class="content__address">
                <h3>住所</h3>
                <p>{{ $cafe->address }}</p>    
            </div>
            <div class="content__opening_hours">
                <h3>営業時間</h3>
                <p>{{ $cafe->opening_hours }}</p>    
            </div>
        </div>
        <div class="edit">
            <a href="/cafes/{{ $cafe->id }}/edit">編集する</a>
        </div>
        <div class="footer">
            <a href="/cafes">戻る</a>
        </div>

        <h1>口コミ登録フォーム</h1>
        <form action="/cafes/{{ $cafe->id }}/posts" method="POST">
            @csrf
            <div class="recommend">
                <h3>評価</h3>
                <select name="post[recommend]" id="recommend">
                    <option value="1" {{ old('post.recommend') == 1 ? 'selected' : '' }}>1</option>
                    <option value="2" {{ old('post.recommend') == 2 ? 'selected' : '' }}>2</option>
                    <option value="3" {{ old('post.recommend') == 3 ? 'selected' : '' }}>3</option>
                    <option value="4" {{ old('post.recommend') == 4 ? 'selected' : '' }}>4</option>
                    <option value="5" {{ old('post.recommend') == 5 ? 'selected' : '' }}>5</option>
                </select>
                @if ($errors->has('post.recommend'))
                    <p class="error-message">{{ $errors->first('post.recommend') }}</p>
                @endif
            </div>
            <div class="price">
                <h3>最低価格 (円単位)</h3>
                <input type="number" name="post[price]" id="price" placeholder="価格" value="{{ old('post.price') }}" min="0" step="10"/>
                @if ($errors->has('post.price'))
                    <p class="error-message">{{ $errors->first('post.price') }}</p>
                @endif
            </div>
            <div class="noisy">
                <h3>ガヤガヤ度（5段階評価）</h3>
                <input type="number" name="post[noisy]" id="noisy" placeholder="ガヤガヤ度" value="{{ old('post.noisy') }}" min="1" max="5" step="1"/>
                @if ($errors->has('post.noisy'))
                    <p class="error-message">{{ $errors->first('post.noisy') }}</p>
                @endif
            </div>
            <div class="time">
                <h3>滞在時間 (時間単位)</h3>
                <input type="number" name="post[time]" id="time" placeholder="滞在時間 (時間)" value="{{ old('post.time') }}" min="0.5" step="0.5"/>
                @if ($errors->has('post.time'))
                    <p class="error-message">{{ $errors->first('post.time') }}</p>
                @endif
            </div>
            <div class="body">
                <h3>コメント</h3>
                <textarea name="post[body]" id="body" placeholder="コメントを入力">{{ old('post.body') }}</textarea>
                @if ($errors->has('post.body'))
                    <p class="error-message">{{ $errors->first('post.body') }}</p>
                @endif
            </div>
            <input type="submit" value="登録"/>
        </form>
        <h1>口コミ一覧</h1>
        <div class="posts">
            @foreach ($cafe->posts as $post)
                <div class="post">
                    
                    <p>投稿者: {{ $post->user->name }}</p>
                    <p>おすすめ度: {{ $post->recommend }}</p>
                    <p>最低価格: ¥{{ number_format($post->price) }}</p>
                    <p>周囲の騒音レベル: {{ $post->noisy }}</p>
                    <p>滞在時間: {{ number_format($post->time , 1) }} 時間</p>
                    <p>投稿日時: {{ $post->created_at }}</p>
                    <p>コメント: {{ $post->body }}</p>
                </div>
                <br />
                <br />
            @endforeach
        </div>
    </body>
</html>
