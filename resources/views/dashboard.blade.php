@extends('layouts.app') 

@section('title')
    Dashboard
@endsection

@section('content')
    <div class="row justify-content-center">
        <div style="text-align:center">
            <p>Welcome {{ Auth::user()->name }}</p>

            <a href="{{ route('posts.create') }}" class="btn btn-dark">Create new post</a>
            <a href="{{ route('users.edit', ['user' => Auth::user()]) }}" class="btn btn-dark">Edit profile</a>
            
            <p>Your posts</p>

            <div class="row justify-content-left">
                <div style="text-align:left">
                    @foreach (Auth::user()->posts as $post)
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
                                        <div class="dropdown-divider"></div>
                                        <a class="dropdown-item" href="{{ route('posts.edit', $post) }}">Edit</a>
                                        <form method ="POST" action="{{ route('posts.destroy', $post) }}">
                                            @csrf
                                            @method('DELETE')
                                            <button type=submit class="dropdown-item">Delete</button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <br />
                    @endforeach
                </div>
            </div>
        </div>
    </div>

@endsection
