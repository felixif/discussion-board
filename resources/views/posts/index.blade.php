@extends('layouts.app') 

@section('title')
    Posts
@endsection

@section('content')
    <p>All the posts on the discussion board</p>

    <button href="{{ route('posts.create') }}">Create new post</button>
    
    @foreach ($posts as $post)
            <h2><a href="{{ route('posts.show', ['id' => $post->id ]) }}"> {{$post->title}}</a> 
                - made by <a href="{{ route('users.show', ['id' => $post->user_id ]) }}">{{$post->user->name}}</a></h2>
            <p>{{$post->text}}</p>
            <br />
    @endforeach
    
@endsection