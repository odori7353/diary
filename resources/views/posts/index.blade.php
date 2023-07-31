<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <title>日記</title>
        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">
    </head>
    <x-app-layout>
    <body>
        <h1>日記</h1>
        <div class='posts'>
            @foreach ($posts as $post)
                <div class='post'>
                    <h2 class='title'><a href="/posts/{{ $post->id }}">{{ $post->title }}</a></h2>
                    <p class='body'>{{ $post->body }}</p>
                    <a href="/categories/{{ $post->category->id }}">{{ $post->category->name }}</a>   
                    <br>
                    <small><a href="/user/{{ $post->user_id }}">作成者{{ $post->user->name }}</a></small><br>
                    
                    <a href='/posts/comments'>コメント</a><br>

                    <p class='date'>日付：{{ $post->created_at}}</p>
                    <br>
                    <form action="/posts/{{ $post->id }}" id="form_{{ $post->id }}" method="post">
                        @csrf
                        @method('DELETE')
                        <button type="button" onclick="deletePost({{ $post->id }})">delete</button> 
                    </form><br>
                </div>
                
            @endforeach
        </div>
        
        <div class='paginate'>
            {{ $posts->links() }}
        </div>
        <a href='/posts/create'>create</a><br>
        <a>ログインユーザ:{{ Auth::user()->name }}</a>
        
        
        
        <script>
    function deletePost(id) {
        'use strict'

        if (confirm('削除すると復元できません。\n本当に削除しますか？')) {
            document.getElementById(`form_${id}`).submit();
        }
    }
</script>
    </body>
    </x-app-layout>
</html>
