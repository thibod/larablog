@extends('layouts/true')

@section('content')
    <form action="/articles/{{$post->post_name}}" method="POST" enctype="multipart/form-data">

        {{ csrf_field() }}

        <div class="form-group">
            <input type="text" class="form-control {{ $errors->has('post_status') ? 'is-invalid' : '' }}" name="post_status" id="post_status" placeholder="Statut de l'article"
                   value="{{ $post->post_status }}"> {!! $errors->first('post_status', '
                                <div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            <input type="text" class="form-control {{ $errors->has('post_category') ? 'is-invalid' : '' }}" name="post_category" id="post_category" placeholder="Catégorie de l'article"
                   value="{{ $post->post_category }}"> {!! $errors->first('post_category', '
                                <div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            <input type="text" class="form-control {{ $errors->has('post_title') ? 'is-invalid' : '' }}" name="post_title" id="post_title" placeholder="Titre de l'article"
                   value="{{ $post->post_title }}"> {!! $errors->first('post_title', '
                                <div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            <textarea class="form-control {{ $errors->has('post_content') ? 'is-invalid' : '' }}" name="post_content" id="post_content" placeholder="Contenu de l'article">{{ $post->post_content }}</textarea>
            {!! $errors->first('post_content', '<div class="invalid-feedback">:message</div>') !!}
        </div>

        <label for="avatar">Editer l'image</label>
        <input type="file" id="post_image" name="post_image" accept="image/png, image/jpeg" class="form-control">

        <input type="hidden" name="_method" value="PATCH">
        <button type="submit" class="btn btn-secondary">Envoyer !</button>
    </form>
@endsection
