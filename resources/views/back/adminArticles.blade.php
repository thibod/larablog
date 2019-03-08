@extends('layouts/main')

@section('content')

    <a href="/admin/articles/create"> Créer un nouvel article ! </a>

    @foreach($posts as $post)
        <ul>
            <li>
                <a href="/admin/articles/{{$post->post_name}}">{{$post->post_title}} by {{$post->user->name}} on {{$post->post_date}}</a>
                <form action="/admin/articles/{{$post->post_name}}"  method="POST">
                    {{ csrf_field() }}
                    <button type="submit" class="btn btn-secondary">DELETE !</button>
                    <input type="hidden" name="_method" value="DELETE">
                </form>
            </li>
        </ul>
    @endforeach

    @if (session('confirmation'))
        <div class="alert alert-success">
            {{ session('confirmation') }}
        </div>
    @endif


@endsection
