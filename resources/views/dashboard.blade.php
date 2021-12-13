@extends('layouts.app') 

@section('title')
    Dashboard
@endsection

@section('content')
    <div class="row justify-content-center">
        <div style="text-align:center">
            <p>Welcome {{ Auth::user()->name }}</p>

            <button href="{{ route('posts.create') }}">Create new post</button>
            
            <p>Your posts</p>
        </div>
    </div>
@endsection
