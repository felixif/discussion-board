@extends('layouts.app') 

@section('title')
    Posts
@endsection

@section('content')
<!--Post-->
<div class="row justify-content-left">
    <div style="text-align:left">
        <div class="card">
            <div class="card-header">
                <a href="{{ route('users.show', ['user' => $post->user ]) }}">{{$post->user->name}}</a>
            </div>
            <div class="card-body">
                <h5 class="card-title"><a href="{{ route('posts.show', ['post' => $post ]) }}"> {{$post->title}}</a></h5>
                <p class="card-text">{{$post->text}}</p>
                <div class="dropdown show">
                    <a class="btn btn-dark dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    Options
                    </a>
                    <div class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                        <a class="dropdown-item" href="{{ route('posts.show', $post) }}">View</a>
                        <div class="dropdown-divider"></div>
                        <a class="dropdown-item" href="{{ route('posts.edit', $post) }}">Edit</a>
                        <form method ="POST" action="{{ route('posts.destroy', $post) }}">
                            @csrf
                            @method('DELETE')
                            <button type=submit class="dropdown-item">Delete</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <br />
    </div>
</div>

<!--New post-->

<br />
    <a href="{{ route('comments.create',$post) }}" class="btn btn-dark">New Comment</a>
    <div id="comment_box">
        <form method="POST" action="{{ route('comments.store', $post) }}">
            @csrf

            <label for="text">Comment</label><br />
            <textarea name="text" class="form-control" v-model="newCommentText" style="height: 100px"></textarea>

            <input type="hidden" name="user_id" v-model="userId" disabled value="{{ Auth::user()->id }}">
            <input type="hidden" name="post_id" v-model="postId"disabled value="{{ $post->id }}">
            <!--
            <label for="user_name">Author</label>
            <input type="text" name="user_name" disabled value="{{ Auth::user()->name }}"></p>
            -->
            <input @click="postComment" class="btn btn-dark" type="submit" value="Post Comment">
        </form>
    </div>
<br />

<!--New Comments-->

<div class="row justify-content-left">
    <div style="text-align:left">
        @foreach ($post->comments as $comment)
            <div class="card">
                <div class="card-header">
                    <a href="{{ route('users.show', $comment->user_id) }}"> {{$comment->user->name}} </a> 
                </div>
                <div class="card-body">
                    <p class="card-text">{{$comment->text}}</p>
                    <div class="dropdown show">
                        <a class="btn btn-dark dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        Options
                        </a>
                        <div class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                            <a class="dropdown-item" href="{{ route('comments.show', $comment) }}">View</a>
                            @if(Auth::user()->id === $comment->user_id)
                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item" href="{{ route('comments.edit', $comment) }}">Edit</a>
                                <form method ="POST" action="{{ route('comments.destroy', $comment) }}">
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
        @endforeach
    </div>
</div>

<script>
    var app= new Vue({
        el: "#comment_box",
        data: {
            comments: [],
            newCommentText: '',
            userId: '',
            postId: '',
        },
        methods: {
            postComment: function() {
                axios.post("{{ route('api.comments.store') }}",
                {
                    text: this.newCommentText,
                    user_id: this.userId,
                    post_id: this.postId,
                })
                .then(response => {
                    this.comments.push(response.data);
                    this.newCommentText = '',
                    this.userId = '',
                    this.postId = '',
                })
                .catch(response => {
                    console.log(response);
                })
            } 
        }
    })
</script>
@endsection