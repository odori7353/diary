<!DOCTYPE HTML>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Posts</title>
        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">
        <script>"/diary/resources/js/like.js"</script>
    </head>
    <x-app-layout>
    <body>
        <small>{{ $post->user->name }}</small>
        <h1 class="title">
            {{ $post->title }}
        </h1>
        <div class="content">
            <div class="content__post">
                <h3>本文</h3>
                <p>{{ $post->body }}</p>    
                <p>日付：{{ $post->created_at}}</p>
            </div>
        </div>
        <button onclick="like({{$post->id}})">いいね</button>
        
     <a href="/categories/{{ $post->category->id }}">{{ $post->category->name }}</a>
        <div class="footer">
            <div class="edit"><a href="/posts/{{ $post->id }}/edit">edit</a></div>
            <a href="/">戻る</a>
        </div>
    </body>
    </x-app-layout>
</html>
