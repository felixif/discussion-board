@extends('layouts.app') 

@section('title')
    Posts
@endsection

@section('content')
<div class="container rounded" style="border:1px solid black">
    <h3>{{$post->title}}</h3>
    <p>{{$post->text}}</p>

    @if (Auth::user()->id === $post->user_id)
        <a href="{{ route('posts.edit',  $post)}}" class="btn btn-dark">Edit Post</a>
        <form method ="POST" action="{{ route('posts.destroy', $post) }}">
            @csrf
            @method('DELETE')
            <button type=submit class="btn btn-dark">Delete Post</button>
        </form>  
    @endif
</div>

<br />
<a href="{{ route('comments.create',$post) }}" class="btn btn-dark">New Comment</a>
<br />

@foreach ($post->comments as $comment)
    <br />
    <div class="container rounded" style="border:1px solid black">
        <p> <a href="{{ route('users.show', $comment->user_id) }}">
                    {{$comment->user->name}}
            </a> 
        </p>
        <p> {{$comment->text}} </p>
        <a href="{{ route('comments.show', $comment) }}" class="btn btn-dark">View</a>
        @if (Auth::user()->id === $comment->user_id)
            <a href="{{ route('comments.edit', $comment) }}" class="btn btn-dark">Edit Comment</a>
            <br />
            <br />
            
            <form method ="POST" action="{{ route('comments.destroy', $comment) }}">
                @csrf
                @method('DELETE')
                <button type=submit class="btn btn-dark">Delete Comment</button>
            </form>
        @endif
    </div>   
@endforeach

@endsection