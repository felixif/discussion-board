@extends('layouts.app') 

@section('title')
    User Profiles
@endsection

@section('content')
    <div class="row justify-content-left">
        <div style="text-align:left">
            <div class="card">
                <div class="card-header">
                    <a href="{{ route('users.show', ['user' => $user ]) }}">{{$user->name}}'s profile</a>
                </div>
                <div class="card-body">
                    <h5 class="card-title">Name: {{$user->name}}</h5>
                    <p class="card-text">Email: {{$user->email}}</p>
                    <p class="card-text">Role: {{$user->role_id}}</p>
                    <p class="card-text">Phone: {{$user->phone}}</p>
                    <div class="dropdown show">
                        <a class="btn btn-dark dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        Options
                        </a>
                        <div class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                            @if(Auth::user()->id === $user->id || Auth::user()->role_id === "adm" )
                                <a class="dropdown-item" href="{{ route('users.edit', $user) }}">Edit</a>
                                <form method ="POST" action="{{ route('users.destroy', $user) }}">
                                    @csrf
                                    @method('DELETE')
                                    <button type=submit class="dropdown-item">Delete</button>
                                </form>  
                            @endif
                        </div>
                    </div>
                </div>
            </div>
            <br />
        </div>
    </div>   
@endsection