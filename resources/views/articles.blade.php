@extends('layouts/true')

@section('content')

    @if (session('confirmation'))
        <div class="alert alert-success">
            {{ session('confirmation') }}
        </div>
    @endif

    @auth
        <a href="/articles/create"> Créer un nouvel article ! </a>
    @endauth

    @foreach($posts as $post)
        <ul>
            <li>
                <a href="/articles/{{$post->post_name}}">{{$post->post_title}} by {{$post->user->name}}
                    on {{$post->post_date}}</a>
                @can('delete', $post)
                    <form action="/articles/{{$post->post_name}}" method="POST">
                        {{ csrf_field() }}
                        <button type="submit" class="btn btn-secondary">DELETE !</button>
                        <input type="hidden" name="_method" value="DELETE">
                    </form>
                @endcan
            </li>
        </ul>
    @endforeach


@endsection
