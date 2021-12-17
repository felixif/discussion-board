@extends('layouts.app') 

@section('title')
    Comments - All coments
@endsection

@section('content')
    <h2><b>All the comments on the discussion board</b></h2>

    <div class="row justify-content-left">
        <div style="text-align:left">
            @foreach ($comments as $comment)
                <div class="card">
                    <div class="card-header">
                        <a href="{{ route('users.show', $comment->user_id) }}"> {{$comment->user->name}} </a> 
                    </div>
                    <div class="card-body">
                        <p class="card-text">{{$comment->text}}</p>
                        <div class="dropdown show">
                            <a class="btn btn-dark dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            Options
                            </a>
                            <div class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                                <a class="dropdown-item" href="{{ route('comments.show', $comment) }}">View</a>
                                @if(Auth::user()->id === $comment->user->id || Auth::user()->role_id === "adm" 
                                    || Auth::user()->role_id === "mod")
                                    <div class="dropdown-divider"></div>
                                    <a class="dropdown-item" href="{{ route('comments.edit', $comment) }}">Edit</a>
                                    <form method ="POST" action="{{ route('comments.destroy', $comment) }}">
                                        @csrf
                                        @method('DELETE')
                                        <button type=submit class="dropdown-item">Delete</button>
                                    </form>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
                <br />
            @endforeach
        </div>
    </div>
    
@endsection