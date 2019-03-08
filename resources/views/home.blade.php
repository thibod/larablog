@extends('layouts/true')


@section('dashboard')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Dashboard</div>

                @auth()
                    <div class="card-body">
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif

                        You are logged in!
                    </div>
                @endauth
            </div>
        </div>
    </div>
</div>
@endsection

@section('content')
    <h1>Home</h1>
    <ul>
        @foreach ( $posts as $post )
            <li>
                <a href="/articles/{{$post->post_name}}">{{ $post->post_title }}</a>
                {{--<a href="{{ url("articles/".$post->post_name) }}">{{ $post->post_title }}</a>--}}
            </li>
        @endforeach
    </ul>
@endsection
