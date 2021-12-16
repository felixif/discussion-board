@extends('layouts.app') 

@section('title')
    Comments - All coments
@endsection

@section('content')
    <h2>All the comments on the discussion board</h2>

    <br />
    <br />
    
    @foreach ($comments as $comment)
        <br />
        <div class="container rounded" style="border:1px solid black">
            <p> <a href="{{ route('users.show', ['user' => $comment->user_id ]) }}">
                        {{$comment->user->name}}
                </a> 
            </p>
            <p> {{$comment->text}} </p>
            <a href="{{ route('comments.show', ['comment' => $comment]) }}" class="btn btn-dark">View</a>
            @if (Auth::user()->id === $comment->user_id)
                <a href="{{ route('comments.edit', ['comment' => $comment]) }}" class="btn btn-dark">Edit Comment</a>
                <br />
                <br />
                
                <form method ="POST" action="{{ route('comment.destroy', []) }}">
                    @csrf
                    @method('DELETE')
                    <button type=submit class="btn btn-dark">Delete Post</button>
                </form>  
            @endif
        </div>   
    @endforeach
    
@endsection