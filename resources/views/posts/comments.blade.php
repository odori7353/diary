<!DOCTYPE HTML>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <title>日記内容</title>
    </head>
    <x-app-layout>
    <body>
        
        <form action="/posts" method="POST">
            @csrf
            
            <div class="body">
                <h2>コメント</h2>
                <textarea name="post[body]" placeholder="コメントを記入"></textarea>
                <p class="body__error" style="color:red">{{ $errors->first('post.body') }}</p>
            </div>
            
            <input type="submit" value="保存"/>
        </form>
        <div class="footer">
            <a href="/">戻る</a>
        </div>
    </body>
    </x-app-layout>
</html>
