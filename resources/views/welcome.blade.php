@extends('layouts.app') 

@section('title')
    Dashboard
@endsection

@section('content')

    @guest
        @if (Route::has("login"))
            <h1 style="text-align:center">Welcome to the discussion board</h1>
            <h2 style="text-align:center">Please login or register to access the content</h2>
        @endif
    @else 
        <p>Welcome {{ Auth::user()->name }}</p>

        <button href="{{ route('posts.create') }}">Create new post</button>
        
        <p>Your posts</p>
    @endguest
@endsection
