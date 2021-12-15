@extends('layouts.app') 

@section('title')
    Posts - Create new post
@endsection

@section('content')

    <form method="POST" action="{{ route('posts.store') }}">
        @csrf

        <label for="title">Title</label><br />
        <input type="text" name="title"><br />

        <label for="text">Contents</label><br />
        <textarea name="text"></textarea><br />

        <input type="hidden" name="user_id" disabled value="{{ Auth::user()->id }}">

        <label for="user_name">Author</label>
        <input type="text" name="user_name" disabled value="{{ Auth::user()->name }}"></p>

        <input class="btn btn-dark" type="submit" value="Submit">
    </form>

    
@endsection