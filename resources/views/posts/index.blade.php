<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <title>日記</title>
        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
        <script src='https://cdn.jsdelivr.net/npm/fullcalendar@6.1.8/index.global.min.js'></script>
        <script src="https://cdn.tailwindcss.com"></script>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
                const events = [
                 @foreach ($posts as $post)
                 {
        		id: "{{ $post->id }}",// ユニークID
        		start: "{{ $post->created_at }}",// 投稿の作成日
        		title: "{{ $post->title }}",// タイトル
        		description: "{{ $post->body }}",// 投稿の詳細
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
    <body　class="font-body">
        <h1 class='py-5 text-center bg-teal-500 font-serif text-2xl' >日記</h1>
         <div id='calendar'></div>
        <div class='posts'>
        <h2 class='py-5 text-center bg-teal-500 font-Meiryo text-xl'>直近の投稿</h2>
            @foreach ($posts as $post)
                <div class='bg-emerald-300'>
                    <h2 class='title font-bold text-4xl text-center font-serif'><a href="/posts/{{ $post->id }}">{{ $post->title }}</a></h2>
                    <h2 class='body text-center text-2xl '>{{ $post->body }}</h2>
                    <h class=<a href="/categories/{{ $post->category->id }} ">{{ $post->category->name }}</a>   
                    <br>
                    <small class='font=Meiryo'><a href="/user/{{ $post->user_id }} ">作成者{{ $post->user->name }}</a></small><br>
                    
                    <p class='text-center bg-red-400'><a href='/posts/{{$post->post_id}}'>コメント入力</a></p>
                    <p class='date duration-7000 delay-200　text-center'>日付：{{ $post->created_at}}</p>
                    <br>
                    <form action="/posts/{{ $post->id }}" id="form_{{ $post->id }}" method="post">
                        @csrf
                        @method('DELETE')
                        <button class='my-2 px-4 py-2 border-2 outline-dotted bg-black-400' type="button" onclick="deletePost({{ $post->id }})">delete</button> 
                    </form><br>
                </div>
                
            @endforeach
        </div>
        <div class='paginate whitespace-nowrap'>
            {{ $posts->links() }}
        </div>
        <a href='/posts/create' class='fixed z-50 bottom-10 right-10 py-5 px-2
  border-2 bg-red-400 rounded-full cursor-pointer'>create</a>
        <a  class='text-green-400' href='/posts/calendar'>calendar</a><br>
        <a >ログインユーザ:{{ Auth::user()->name }}</a>

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
