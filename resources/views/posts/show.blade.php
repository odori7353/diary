<!DOCTYPE HTML>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Posts</title>
        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
        <script src='https://cdn.jsdelivr.net/npm/fullcalendar@6.1.8/index.global.min.js'></script>
        <script src="https://cdn.tailwindcss.com"></script>
        <script>"/diary/resources/js/like.js"</script>
    </head>
    <x-app-layout>
    <body　class="bg-gradient-to-r from-blue-500 text-center">
        <small class='text-center text-xl'>{{ $post->user->name }}</small>
        <h1 class="title text-center py-5 text-center bg-teal-500 font-serif text-2xl">
            {{ $post->title }}
        </h1>
        <div class="content text-center">
            <div class="content__post">
                <p class='py-5 text-center bg-teal-500 font-serif text-2xl' >{{ $post->body }}</p>    
                <p>日付：{{ $post->created_at}}</p>
            </div>
            <p>コメント：</p>
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
