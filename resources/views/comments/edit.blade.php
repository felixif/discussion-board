@extends('layouts.app') 

@section('title')
    Comment edit
@endsection

@section('content')

  @if ($comment->user->id === Auth::user()->id 
        || Auth::user()->role_id === "adm"
        || Auth::user()->role_id === "mod")
  <h1>Edit your comment</h1>

  <form method="POST" action="{{ route('comments.update', $comment) }}">
      <input type="hidden" name="_token" value="{{ csrf_token() }}" />
      <input type="hidden" name="_method" value="PUT" />
      
      <div class="form-group">
        <label for="text">Contents</label>
        <textarea class="form-control" name="text">
          {{$comment->text}}
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