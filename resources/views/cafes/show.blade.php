<!DOCTYPE HTML>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>カフェ詳細画面</title>
        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
    </head>
    <body class="bg-light">
        <div class="container px-4">
            <div class="row gx-5">
                
                <div class="col">
                    <div class="p-3 bg-white border">
                        <h1 class="name bg-secondary-subtle border border-dark p-3 text-center">{{ $cafe->name }}</h1>
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
                        <div class="edit mb-2">
                            <a href="/cafes/{{ $cafe->id }}/edit" class="btn btn-primary">編集する</a>
                        </div>
                        <div class="footer mb-2">
                            <a href="/cafes" class="btn btn-secondary">戻る</a>
                        </div>
                        
                    <br />
                    
                        <h1 class="bg-secondary-subtle border border-dark p-3 text-center">口コミ登録フォーム</h1>
                        <form action="/cafes/{{ $cafe->id }}/posts" method="POST">
                            @csrf
                            <div class="mb-3">
                                <h3>評価（5段階評価）</h3>
                                <select name="post[recommend]" id="recommend" class="form-select">
                                    <option value="1" {{ old('post.recommend') == 1 ? 'selected' : '' }}>1</option>
                                    <option value="2" {{ old('post.recommend') == 2 ? 'selected' : '' }}>2</option>
                                    <option value="3" {{ old('post.recommend') == 3 ? 'selected' : '' }}>3</option>
                                    <option value="4" {{ old('post.recommend') == 4 ? 'selected' : '' }}>4</option>
                                    <option value="5" {{ old('post.recommend') == 5 ? 'selected' : '' }}>5</option>
                                </select>
                                @if ($errors->has('post.recommend'))
                                <p class="text-danger">{{ $errors->first('post.recommend') }}</p>
                                @endif
                            </div>
                            <div class="mb-3">
                                <h3>価格 (円単位)</h3>
                                <input type="number" name="post[price]" id="price" placeholder="価格" value="{{ old('post.price') }}" min="0" step="10" class="form-control"/>
                                @if ($errors->has('post.price'))
                                    <p class="text-danger">{{ $errors->first('post.price') }}</p>
                                @endif
                            </div>
                            <div class="mb-3">
                                <h3>ガヤガヤ度（5段階評価）</h3>
                                <input type="number" name="post[noisy]" id="noisy" placeholder="ガヤガヤ度" value="{{ old('post.noisy') }}" min="1" max="5" step="1" class="form-control"/>
                                @if ($errors->has('post.noisy'))
                                    <p class="text-danger">{{ $errors->first('post.noisy') }}</p>
                                @endif
                            </div>
                            <div class="mb-3">
                                <h3>滞在時間 (時間単位)</h3>
                                <input type="number" name="post[time]" id="time" placeholder="滞在時間 (時間)" value="{{ old('post.time') }}" min="0.5" step="0.5" class="form-control"/>
                                @if ($errors->has('post.time'))
                                    <p class="text-danger">{{ $errors->first('post.time') }}</p>
                                @endif
                            </div>
                            <div class="mb-3">
                                <h3>コメント</h3>
                                <textarea name="post[body]" id="body" placeholder="コメントを入力してください" class="form-control">{{ old('post.body') }}</textarea>
                                @if ($errors->has('post.body'))
                                    <p class="text-danger">{{ $errors->first('post.body') }}</p>
                                @endif
                            </div>
                            <input type="submit" value="登録" class="btn btn-primary mt-3"/>
                        </form>
                    </div>
                </div>
                
                <div class="col">
                    <div class="p-3 bg-white border">
                        <h1 class="bg-secondary-subtle border border-dark p-3 text-center">口コミ一覧</h1>
                            
                        <div class="posts">
                            @foreach ($cafe->posts as $post)
                                <div class="post mb-3 p-3 border rounded">
                                    <p>投稿者: {{ $post->user->name }}</p>
                                    <p>おすすめ度: {{ $post->recommend }}</p>
                                    <p>価格: ¥{{ number_format($post->price) }}</p>
                                    <p>周囲の騒音レベル: {{ $post->noisy }}</p>
                                    <p>滞在時間: {{ number_format($post->time , 1) }} 時間</p>
                                    <p>投稿日時: {{ $post->created_at }}</p>
                                    <p>コメント: {{ $post->body }}</p>
                                    <form action="/posts/{{ $post->id }}" id="form_{{ $post->id }}" method="post">
                                        @csrf
                                        @method('DELETE')
                                       <button type="button" onclick="deletePost({{ $post->id }})" class="btn btn-danger">削除</button> 
                                    </form>
                                </div>
                            @endforeach
                        </div>
                        
                        <script>
                            function deletePost(id) {
                                'use strict'
                        
                                    if (confirm('削除すると復元できません。\n本当に削除しますか？')) {
                                    document.getElementById(`form_${id}`).submit();
                                }
                            }
                        </script>
                    </div>
                </div>
            </div> 
        </div>    
    </body>
</html>
