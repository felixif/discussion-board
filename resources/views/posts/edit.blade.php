@extends('layouts.app') 

@section('title')
    Post edit
@endsection

@section('content')
    @if ($post->user->id === Auth::user()->id || Auth::user()->role_id === "adm")
    <h1>Edit your post</h1>

    <form method="POST" action="{{ route('posts.update', $post) }}">
        <input type="hidden" name="_token" value="{{ csrf_token() }}" />
        <input type="hidden" name="_method" value="PUT" />
        
        <div class="form-group">
          <label for="title">Title</label>
          <input type="text"
                 name="title"  
                 value="{{$post->title}}" 
                 class="form-control">
        </div>

        <div class="form-group">
          <label for="text">Contents</label>
          <textarea class="form-control" name="text">
            {{$post->text}}
          </textarea>
        </div>
        <br />
        <button type="submit" class="btn btn-dark">
          <i class="fa fa-btn fa-sign-in"></i>Update
        </button>
      </form>
@else
  <h1>You really should not be here!</h1>
@endif
 
    
@endsection