@extends('layouts.app')

@section('title')
    @if($user)
        {{$user ?? ''}}'s profile
    @else
        Blank profile
    @endif
@endsection
@section('content')
    @if ($user)
        <h1></h1>
        <p>This is the profile of {{$user ?? ''}}</p>        
    @else
        <h1>No profile!</h1>
    @endif
@endsection