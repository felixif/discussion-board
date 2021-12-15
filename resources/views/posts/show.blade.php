@extends('layouts.app') 

@section('title')
    Posts
@endsection

@section('content')
<div class="container rounded" style="border:1px solid black">
    <h3>{{$post->title}}</h3>
    <p>{{$post->text}}</p>

    @if (Auth::user()->id === $post->user_id)
        <a href="{{ route('posts.edit', ['post' => $post])}}" class="btn btn-dark">Edit Post</a>
        <br />
        <br />
        
        <form method ="POST" action="{{ route('posts.destroy', ['post' => $post]) }}">
            @csrf
            @method('DELETE')
            <button type=submit class="btn btn-dark">Delete Post</button>
        </form>  
    @endif
</div>
    
@endsection