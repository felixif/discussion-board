@extends('layouts.app') 

@section('title')
    Posts - Create new post
@endsection

@section('content')

    <form method="POST" action="{{ route('posts.store') }}">
        <p>Title: <input type="text" name="title"></p>
        <p>Contents:</p>
        <textarea name="text"></textarea>
        <button type="submit">Post</button>
    </form>

    
@endsection