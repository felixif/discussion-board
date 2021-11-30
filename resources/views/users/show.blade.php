@extends('layouts.app') 

@section('title')
    User Profiles
@endsection

@section('content')
    <p>{{$user->name}}'s profile</p> <a href="{{ route('users.edit', ['id' => $user->id ]) }}">[edit]</a>
    <ul>
       <li>Name: {{$user->name}}</li>
       <li>Email: {{$user->email}}</li>
    </ul>
    
@endsection