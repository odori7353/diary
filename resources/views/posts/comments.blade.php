<!DOCTYPE HTML>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <title>日記内容</title>
    </head>
    <x-app-layout>
    <body>
        <form action="/posts/comments" method="POST">
            @csrf
            
            <div class="body">
                <h2>コメント</h2>
                <textarea name="comment[body]" placeholder="コメントを記入"></textarea>
                <input type='hidden' name='comment[post_id]' value="1"/>
                <p class="body__error" style="color:red">{{ $errors->first('comment.body') }}</p>
            </div>
            
            <input type="submit" value="保存"/>
        </form>
        <div class="footer">
            <a href="/">戻る</a>
        </div>
    </body>
    </x-app-layout>
</html>
