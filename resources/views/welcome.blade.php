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
        <p>Welcome {{ Auth::user()->name }}</p><br />
        
        <a href="{{ route('posts.create') }}" class="btn btn-dark">Create a new post</a>
        <a href="{{ route('dashboard') }}" class="btn btn-dark">Go to dashboard</a>
        

    @endguest
@endsection
