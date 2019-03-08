@extends('layouts/true')

@section('content')
    @foreach($posts as $post)
    <ul>
        <li>
            <a href="/articles/{{$post->post_name}}">{{$post->post_name}} by {{$post->user->name}} on {{$post->post_date}}</a>
        </li>
    </ul>
    @endforeach
@endsection
