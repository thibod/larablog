<?php

namespace App\Http\Controllers;

use App\Comment;
use App\Http\Requests\CommentRequest;
use App\Post;
use Illuminate\Http\Request;

class ArticlesController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth', ['except' => ['index', 'show']]);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $posts = Post::all();
        return view('articles', array(
            'posts' => $posts
        ));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('back/newArticleForm');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $post = new Post();
        $post->post_name = request('post_name');
        $post->post_status = request('post_status');
        $post->post_category = request('post_category');
        $post->post_title = request('post_title');
        $post->post_content = request('post_content');
        $post->post_type = 'article';
        $post->post_date = now();
        $post->user_id = request('user_id');
        $post->save();
        return $this->index();
    }

    /**
     * Display the specified resource.
     *
     * @param $post_name
     * @return \Illuminate\Http\Response
     */
    public function show($post_name)
    {
        $post = Post::all()->where('post_name',$post_name)->first(); //get post
        return view('posts/single',array( //Pass the post to the view
            'post' => $post
        ));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param $post_name
     * @return \Illuminate\Http\Response
     */
    public function edit($post_name)
    {
        $post = Post::all()->where('post_name',$post_name)->first(); //get post
        return view('back/editArticleForm', array(
            'post' => $post
        ));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param $post_name
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $post_name)
    {
        $post = Post::all()->where('post_name',$post_name)->first(); //get post

        $post->post_status = request('post_status');
        $post->post_category = request('post_category');
        $post->post_title = request('post_title');
        $post->post_content = request('post_content');
        $post->user_id = request('user_id');
        $post->post_name = request('post_name');
        $post->save();

        return $this->show($post_name);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param $post_name
     * @return \Illuminate\Http\Response
     */
    public function destroy($post_name)
    {
        $post = Post::all()->where('post_name',$post_name)->first(); //get post

        //        dd($post);
        $post->delete();

        return redirect()->route('articles.index')->with([
            'confirmation' => 'Article supprimé avec succès !'
        ]);
    }

    public function storeComment(CommentRequest $request)
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
