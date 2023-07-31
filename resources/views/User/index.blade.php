<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <title>日記</title>
        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">
    </head>
    <x-app-layout>
      
        
        
        <h1>個人ページ</h1><br>
        
        <div class='posts'>
            
                <div class="own_posts">
                
                    @foreach($own_posts as $post)
                        <div>
                            <h4><a href="/post/{{ $post->id }}">{{ $post->title }}</a></h4>
                           
                            <p>{{ $post->body }}</p>
                             <p class='date'>日付：{{ $post->created_at}}</p><br>
                        </div>
                    @endforeach
                    <div class='paginate'>
                        {{ $own_posts->links() }}
                    </div>
                </div>
        </div>
        
     
        <a href="/">戻る</a>
        
        
    </x-app-layout>
