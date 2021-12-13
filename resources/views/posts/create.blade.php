@extends('layouts.app') 

@section('title')
    Posts - Create new post
@endsection

@section('content')

    <form method="POST" action="{{ route('posts.store') }}">
        <p>Title: <input type="text" name="title"></p>
        <p>Contents:</p>
        <textarea name="text"></textarea>
        <p>Author: <input type="text" name="user_id" disabled value="{{ Auth::user()->id }}"></p>
        <button type="submit">Post</button>
    </form>

    
@endsection