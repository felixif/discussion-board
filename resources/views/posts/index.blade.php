@extends('layouts.app') 

@section('title')
    Posts
@endsection

@section('content')
    <h2>All the posts on the discussion board</h2>

    <a href="{{ route('posts.create') }}" class="btn btn-dark">Create new post</a>
    <br />
    <br />
    
    @foreach ($posts as $post)
            <div class="container rounded" style="border:1px solid black">
                <h2><a href="{{ route('posts.show', ['post' => $post ]) }}"> {{$post->title}}</a> 
                    - made by <a href="{{ route('users.show', ['user' => $post->user_id ]) }}">{{$post->user->name}}</a></h2>
                <p>{{$post->text}}</p>
            </div>
            <br />
    @endforeach
    
@endsection