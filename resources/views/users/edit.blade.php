@extends('layouts.app') 

@section('title')
    Users edit
@endsection

@section('content')
  @if ($user->id === Auth::user()->id || Auth::user()->role_id === "adm")
    <h1>Edit your profile</h1>

    <form method="POST" action="{{ route('users.update', $user) }}">
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
        @if (Auth::user()->role_id !== "adm")
          <div class="form-group">
            <label for="role_id">Role</label>
            <select type="text" name="role_id" class="form-control" disabled>
              @switch($user->role_id)
                  @case($user->role_id === 'adm')
                      <option value="usr">usr</option>
                      <option value="mod">mod</option>
                      <option selected="selected" value="adm">adm</option>
                      @break
                  @case($user->role_id === 'mod')
                      <option value="usr">usr</option>
                      <option selected="selected" value="mod">mod</option>
                      <option value="adm">adm</option>
                      @break
                  @case($user->role_id === 'usr')
                      <option selected="selected" value="usr">usr</option>
                      <option value="mod">mod</option>
                      <option value="adm">adm</option>
                      @break
                  @default    
              @endswitch    
            </select>
          </div>
            
        @else
          <div class="form-group">
            <label for="role_id">Role</label>
            <select type="text" name="role_id" class="form-control">
              @switch($user->role_id)
                  @case($user->role_id === 'adm')
                      <option value="usr">usr</option>
                      <option value="mod">mod</option>
                      <option selected="selected" value="adm">adm</option>
                      @break
                  @case($user->role_id === 'mod')
                      <option value="usr">usr</option>
                      <option selected="selected" value="mod">mod</option>
                      <option value="adm">adm</option>
                      @break
                  @case($user->role_id === 'usr')
                      <option selected="selected" value="usr">usr</option>
                      <option value="mod">mod</option>
                      <option value="adm">adm</option>
                      @break
                  @default    
              @endswitch    
          </select>
        </div>
        @endif
        <br />
        <button type="submit" class="btn btn-dark">
          <i class="fa fa-btn fa-sign-in"></i>Update
        </button>
      </form>
  @else
      <h1>You really should not be here!</h1>
  @endif
    
@endsection