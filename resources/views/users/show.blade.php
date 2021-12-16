@extends('layouts.app') 

@section('title')
    User Profiles
@endsection

@section('content')
    <p>{{$user->name}}'s profile</p> 

    @if ($user->id === Auth::user()->id)
        <a href="{{ route('users.edit', $user) }}" class="btn btn-dark">Edit profile</a>
    @endif
    
    {{-- Add delete button for admin --}}

    <br>
    <br>

    <p>Name: {{$user->name}}</p>
    <p>Email: {{$user->email}}</p>
    
@endsection