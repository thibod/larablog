<?php

namespace App\Http\Controllers;

use App\Post;
use Illuminate\Http\Request;

class AdminArticlesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $posts = Post::all();
        return view('back/adminArticles', array(
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
        return view('back/single',array( //Pass the post to the view
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
}
