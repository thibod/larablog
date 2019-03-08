<?php

namespace App\Http\Controllers;

use App\Comment;
use App\Http\Requests\CommentRequest;
use Illuminate\Http\Request;

class ArticlesController extends Controller
{
    public function index() {
        $posts = \App\Post::all();
        return view('articles', array(
            'posts' => $posts
        ));
    }

    public function show($post_name) {
        $post = \App\Post::all()->where('post_name',$post_name)->first(); //get post
        return view('posts/single',array( //Pass the post to the view
            'post' => $post
        ));
    }

    public function store(CommentRequest $request)
    {
        $comment = new Comment();
        $comment->comment_name = request('comment_name');
        $comment->comment_email = request('comment_email');
        $comment->comment_content = request('comment_content');
        $comment->comment_date = now();
        $comment->post_id = request ('post_id');
        $comment->save(); // on enregistre dans la base
        return back();
    }
}
