@extends('layouts.app') 

@section('title')
    Comments - Create new comment
@endsection

@section('content')

    <form method="POST" action="{{ route('comments.store', $post) }}">
        @csrf

        <label for="text">Contents</label><br />
        <textarea name="text"></textarea><br />

        <input type="hidden" name="user_id" disabled value="{{ Auth::user()->id }}">
        <input type="hidden" name="post_id" disabled value="{{ $post->id }}">

        <label for="user_name">Author</label>
        <input type="text" name="user_name" disabled value="{{ Auth::user()->name }}"></p>

        <input class="btn btn-dark" type="submit" value="Submit">
    </form>

    
@endsection