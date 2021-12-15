@extends('layouts.app') 

@section('title')
    Users edit
@endsection

@section('content')
  @if ($user->id === Auth::user()->id)
    <h1>Edit your profile</h1>

    <form method="POST" action="{{ route('users.update', $user->id) }}">
        <input type="hidden" name="_token" value="{{ csrf_token() }}" />
        <input type="hidden" name="_method" value="PUT" />
        <div class="form-group">
          <label for="name">Name</label>
          <input
            type="text"
            name="name"
            value="{{ $user->name }}"
            class="form-control"
          />
        </div>
        <div class="form-group">
          <label for="email">Email</label>
          <input
            type="email"
            name="email"
            value="{{ $user->email }}"
            class="form-control"
          />
        </div>
        <br />
        <button type="submit" class="btn btn-primary">
          <i class="fa fa-btn fa-sign-in"></i>Update
        </button>
      </form>
  @else
      <h1>You really should not be here!</h1>
  @endif
    
@endsection