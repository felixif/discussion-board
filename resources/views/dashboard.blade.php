@extends('layouts.app') 

@section('title')
    Dashboard
@endsection

@section('content')
    <div class="row justify-content-center">
        <div style="text-align:center">
            <p>Welcome {{ Auth::user()->name }}</p>

            <a href="{{ route('posts.create') }}" class="btn btn-dark">Create new post</a>
            
            <p>Your posts</p>

            @foreach (Auth::user()->posts as $post)
                <h2><a href="{{ route('posts.show', ['id' => $post->id ]) }}"> {{$post->title}}</a> 
                    - made by <a href="{{ route('users.show', ['id' => $post->user_id ]) }}">{{$post->user->name}}</a></h2>
                <p>{{$post->text}}</p>
                <br />
            @endforeach
            
        </div>
    </div>
@endsection
