@extends('layouts.app') 

@section('title')
    Posts - Create new post
@endsection

@section('content')

    <div class="card">
        <div class="card-header">New Post</div>

            <div class="card-body">
            
                <form method="POST" action="{{ route('posts.store') }}">
                    @csrf
                    
                    <div class="row mb-3">
                        <label for="title">Title</label>
                        <div class="col-mb-3">
                            <input class="form-control" type="text" name="title">
                        </div>
                    </div>

                    <div class="row mb-3">
                        <label for="text">Contents</label>
                        <div class="col-mb-3">
                            <textarea class="form-control" name="text" style="height: 100px"></textarea>
                        </div>
                    </div>

                    <div class="row mb-3">
                        <div class="col-mb-3">
                            <button type="submit" class="btn btn-dark">
                                Post
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>

    
@endsection