<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\Comment;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;


class CommentsController extends Controller
{
    //
    public function store(Request $request)
    {;
        $comment = new Comment;
        $post_id = $request->input('post_id');
        $comment->post_id = $post_id;
        $comment->body = $request->input('body');
        $comment->user_id = Auth::id();

        $comment->save();

        return redirect('/posts');
    }
}
