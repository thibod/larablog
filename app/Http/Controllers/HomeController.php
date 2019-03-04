<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index() {
        $posts = \App\Post::orderBy('id', 'desc')->limit(3)->offset(0)->get();
        return view('welcome', array('posts' => $posts));
    }
}
