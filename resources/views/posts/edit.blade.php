@extends('layouts.app') 

@section('title')
    Post edit
@endsection

@section('content')
  @if ($post->user_id === Auth::user()->id)
  <h1>Edit your post</h1>

  <form method="POST" action="{{ route('posts.update', $post) }}">
        <label for="title">Title</label><br />
        <input type="text" name="title"  value="{{$post->title}}"><br />

        <label for="text">Contents</label><br />
        <textarea name="text">{{$post->text}}</textarea><br />

        <input type="hidden" name="user_id" disabled value="{{ Auth::user()->id }}">

        <label for="user_name">Author</label>
        <input type="text" name="user_name" disabled value="{{ Auth::user()->name }}"></p>

        <input class="btn btn-dark" type="submit" value="Submit">
  </form>
  @else
      <h1>You really should not be here!</h1>
  @endif
    
@endsection