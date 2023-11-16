<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
use App\Http\Requests\PostRequest; // useする
use App\Models\Category;
use App\Models\User;
use App\Models\Comment;





class PostController extends Controller
{
    //
        public function index(Post $post)//インポートしたPostをインスタンス化して$postとして使用。
        {
           return view('posts.index')->with(['posts' => $post->getPaginateByLimit()]);
               //blade内で使う変数'posts'と設定。'posts'の中身にgetを使い、インスタンス化した$postを代入。
        }
        
        public function show(Post $post)
        {
            return view('posts.show')->with(['post' => $post]);
         //'post'はbladeファイルで使う変数。中身は$postはid=1のPostインスタンス。
        }
        
        
        public function store(PostRequest $request, Post $post)
        {
            $input = $request['post'];
            $input += ['user_id' => $request->user()->id];
            $post->fill($input)->save();
            return redirect('/posts/' . $post->id);
        }
        
        public function edit(Post $post)
        {
            return view('posts.edit')->with(['post' => $post]);
        }
        
        public function calendar(Post $post)
        {
            return view('posts.calendar');
        }
        
        public function update(PostRequest $request, Post $post)
        {
            $input_post = $request['post'];
            $input_post += ['user_id' => $request->user()->id];
            $post->fill($input_post)->save();
            return redirect('/posts/' . $post->id);
        }
        
        public function delete(Post $post)
        {
            dd($post);
            $post->delete();
            return redirect('/');
        }
        
        public function create(Category $category)
        {
            return view('posts.create')->with(['categories' => $category->get()]);
        }
          
       public function commentcreate(Post $post)
       {
           return view('posts.comments')->with(['posts' => $posts->getBy()]);
       }
       
       public function commentstore(Request $request, Comment $comment)
       {
        $input = $request['comment'];
        $input += ['user_id' => $request->user()->id];
                $comment->fill($input)->save();
            return redirect('/posts/' . $post->id);
           //return view('posts.comments');
       }
    }
