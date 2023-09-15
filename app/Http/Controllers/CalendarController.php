<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\Category;
use App\Models\User;

class CalendarController extends Controller
{
    public function getEvents(Post $post)
    {
        return view('posts.show')->with(['post' => $post]);
         //'post'はbladeファイルで使う変数。中身は$postはid=1のPostインスタンス。
        // return [
        //     // events: {
        //     // url: '/Calendar.php'
        //     // }
        //     [
        //         'title' => '美容院',
        //         'description' => '人気の美容室予約取れた',
        //         'start' => '2023-09-10',
        //         'end'   => '2023-09-10',
        //     ],
        //     [
        //         'title' => 'シルバーウィーク旅行',
        //         'description' => '人気の旅館の予約が取れた',
        //         'start' => '2023-09-20 10:00:00',
        //         'end'   => '2023-09-22 18:00:00',
        //         'url'   => 'https://admin.juno-blog.site',
        //     ],
        //     [
        //         'title' => '給料日',
        //         'start' => '2023-09-10',
        //         'color' => '#ff44cc',
        //     ],
       // ];
    }
}