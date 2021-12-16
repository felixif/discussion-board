@extends('layouts.app') 

@section('title')
    Comments
@endsection

@section('content')
    <div class="container rounded" style="border:1px solid black">
        <p> <a href="{{ route('users.show', $comment->user_id) }}">
                    {{$comment->user->name}}
            </a> 
        </p>
        <p> {{$comment->text}} </p>
        <a href="{{ route('comments.show', $comment) }}" class="btn btn-dark">View</a>
        @if (Auth::user()->id === $comment->user_id)
            <a href="{{ route('comments.edit', $comment) }}" class="btn btn-dark">Edit Comment</a>
            <br />
            <br />
            
            <form method ="POST" action="{{ route('comments.destroy', $comment) }}">
                @csrf
                @method('DELETE')
                <button type=submit class="btn btn-dark">Delete Comment</button>
            </form>  
        @endif
    </div>   
@endsection