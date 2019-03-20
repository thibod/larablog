<div>
    New comment on <a href="http://localhost:8000/articles/{{$comment->post->post_name}}">{{$comment->post->post_title}}</a>
    <br />
    {{ $comment->comment_name}} commented {{ $comment->comment_content}} at {{$comment->comment_date}}
</div>