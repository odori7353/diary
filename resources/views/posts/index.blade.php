<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <title>日記</title>
        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
        <script src='https://cdn.jsdelivr.net/npm/fullcalendar@6.1.8/index.global.min.js'></script>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
                const events = [
                 @foreach ($posts as $post)
                 {
        		id: "{{ $post->id }}",// ユニークID
        		start: "{{ $post->created_at }}",// イベント開始日
        		title: "{{ $post->title }}",// イベントのタイトル
        		description: "{{ $post->body }}",// イベントの詳細
        		backgroundColor: "red",// 背景色
        		borderColor: "red",// 枠線色
        		editable: true,// イベント操作の可否

        	},
               
            @endforeach
        	
        ];
        console.log(events);
        var calendarEl = document.getElementById('calendar');
        var calendar = new FullCalendar.Calendar(calendarEl, {
            initialView: 'dayGridMonth',
            locale: 'ja',
            height: 'auto',
            firstDay: 1,
            navLinks: true,
            events: events,
            dateClick: (e)=>{
            		console.log("dateClick:", e);
            	},
            	eventClick: (e)=>{
            		console.log("eventClick:", e.event.id);
            		window.location.href = 'https://0dce7067be3a49fcae29aa22b6eac1cb.vfs.cloud9.us-east-1.amazonaws.com/posts/' + e.event.id;
            	},
            	eventDidMount: (e)=>{// カレンダーに配置された時のイベント
            		/*tippy(e.el, {// TippyでTooltipを設定する
            			content: e.event.extendedProps.description,
            		});*/
            		console.log('aa');
            	},
//Reference: https:'/posts/create'
            headerToolbar: {
                left: "dayGridMonth,listMonth",
                center: "title",
                right: "today prev,next"
            },
            buttonText: {
                today: '今月',
                month: '月',
                list: 'リスト'
            },
            noEventsContent: 'スケジュールはありません',
            eventSources: [ // ←★追記
                {
                    url: '/get_events',
                },
            ],
            eventSourceFailure () { // ←★追記
                console.error('エラーが発生しました。');
            },
            eventMouseEnter (info) { // ←★追記
                /*$(info.el).popover({
                    title: info.event.title,
                    content: info.event.extendedProps.description,
                    trigger: 'hover',
                    placement: 'top',
                    container: 'body',
                    html: true
                });*/
            }
         });
         calendar.render();
    });
    
    //   {document.addEventListener('DOMContentLoaded', function() {
    //     var calendarEl = document.getElementById('calendar');
    //     var calendar = new FullCalendar.Calendar(calendarEl, {
    //       initialView: 'dayGridMonth'
    //     });
    //     calendar.render();
    //   });
    
    </script>
    </head>
    <x-app-layout>
    <body>
        <h1>日記</h1>
         <div id='calendar'></div>
        <div class='posts'>
        <h2 {color: #333333}>直近の投稿</h2>
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
        <a href='/posts/calendar'>calendar</a><br>
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
