@extends('layouts.app') 

@section('title')
    Posts - {{$post->title}}
@endsection

@section('content')
    <p>{{$post->text}}</p>
    
@endsection