@extends('layouts.app') 

@section('title')
    Users
@endsection

@section('content')
    <p>The users on the discussion board:</p>
    <ul style="list-style: none">
        @foreach ($users as $user)
            <li><a href="{{ route('users.show', $user) }}"> {{$user->name}}</a></li>
        @endforeach
    </ul>
    
@endsection