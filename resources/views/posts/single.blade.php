@extends('layouts/true')

@section('content')
    <h1>{{$post->post_title}}</h1>
    <h2>By {{$post->user->name}}</h2>
    <div>{{$post->post_content}}</div>

    <br /><br /><br />
    @foreach($post->comments as $comment)
        <ul>
            <li>
                <p>{{$comment->comment_date}} : {{$comment->comment_name}} says :</p>
                <p>{{$comment->comment_content}}</p>
            </li>
        </ul>
    @endforeach

    <form action="{{ url('/articles/{post_name}') }}" method="POST">
        {{ csrf_field() }}
        <div class="form-group">
            <input type="text" class="form-control {{ $errors->has('comment_name') ? 'is-invalid' : '' }}" name="comment_name" id="comment_name" placeholder="Votre nom"
                   value="{{ old('comment_name') }}"> {!! $errors->first('comment_name', '
                            <div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            <input type="email" class="form-control {{ $errors->has('comment_email') ? 'is-invalid' : '' }}" name="comment_email" id="comment_email" placeholder="Votre email"
                   value="{{ old('comment_email') }}"> {!! $errors->first('comment_email', '
                            <div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            <textarea class="form-control {{ $errors->has('comment_content') ? 'is-invalid' : '' }}" name="comment_content" id="comment_content" placeholder="Votre message">{{ old('comment_content') }}</textarea>                            {!! $errors->first('contact_message', '
                            <div class="invalid-feedback">:message</div>') !!}
        </div>
        <input type="hidden" name="post_id" id="post_id" value="{{$post->id}}">
        <button type="submit" class="btn btn-secondary">Envoyer !</button>
    </form>

    @auth
        <a href="/articles/{{$post->post_name}}/edit">EDITER</a>
    @endauth
@endsection
