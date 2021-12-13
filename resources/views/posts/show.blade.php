@extends('layouts.app') 

@section('title')
    Posts
@endsection

@section('content')
    <h3>{{$post->title}}</h3>
    <p>{{$post->text}}</p>
    
@endsection