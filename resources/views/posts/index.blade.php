@extends('layouts.app') 

@section('title')
    Posts - All posts
@endsection

@section('content')
    <h2><b>All the posts on the discussion board</b></h2>
    <a href="{{ route('posts.create') }}" class="btn btn-dark">Create new post</a>
    <br />
    <br />
    
    <div class="row justify-content-left">
        <div style="text-align:left">
            @foreach ($posts as $post)
                <div class="card">
                    <div class="card-header">
                        <a href="{{ route('users.show', ['user' => $post->user ]) }}">{{$post->user->name}}</a>
                    </div>
                    <div class="card-body">
                        <h5 class="card-title"><a href="{{ route('posts.show', ['post' => $post ]) }}"> {{$post->title}}</a></h5>
                        <p class="card-text">{{$post->text}}</p>
                        <div class="dropdown show">
                            <a class="btn btn-dark dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            Options
                            </a>
                            <div class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                                <a class="dropdown-item" href="{{ route('posts.show', $post) }}">View</a>
                                @if(Auth::user()->id === $post->user->id || Auth::user()->role_id === "adm" 
                                    || Auth::user()->role_id === "mod" )
                                    <div class="dropdown-divider"></div>
                                    <a class="dropdown-item" href="{{ route('posts.edit', $post) }}">Edit</a>
                                    @if(Auth::user()->id === $post->user->id || Auth::user()->role_id === "adm")
                                        <form method ="POST" action="{{ route('posts.destroy', $post) }}">
                                            @csrf
                                            @method('DELETE')
                                            <button type=submit class="dropdown-item">Delete</button>
                                        </form> 
                                    @endif 
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