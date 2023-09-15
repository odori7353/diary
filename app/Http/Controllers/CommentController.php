<?php
namespace App\Http\Controllers;
use App\Models\Comments;

class CommentController extends Controller
{
    public function commentstore(Request $request, Comment $comment)
        {
            $input = $request['comment'];
            $post->fill($input)->save();
            return view('posts.comments');
        }
        
}