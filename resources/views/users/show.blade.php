@extends('layouts.app') 

@section('title')
    User Profiles
@endsection

@section('content')
    <p>{{$user->name}}'s profile</p>
    <ul>
       <li>Name: {{$user->name}}</li>
       <li>Email: {{$user->email}}</li>
    </ul>
    
@endsection