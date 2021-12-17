<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use App\Models\Post;
use App\Models\User;
use App\Notifications\Newcomment;
use Illuminate\Http\Request;
use Illuminate\Notifications\Notifiable;


class CommentController extends Controller
{
    /**
     * Allows the guest to only see the lists of comments and the
     * comments in detail
     */
    public function __construct()
    {
        $this->middleware('auth')->except('index', 'show');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $comments = Comment::all();
        return view('comments.index', ['comments' => $comments]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Post $post)
    {
        return view('comments.create', ['post' => $post]);
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, Post $post)
    {
        $this->validate($request, [
            'text' => 'required|min:3|max:1000',
            'user_id' => 'required',
            'post_id' => 'required',
        ]);

        $comment = new Comment;
        $comment->text = $request->text;
        $comment->user()->associate($request->user());
        $post->comments()->save($comment);

        return redirect()->route('posts.show', ['post' => $post]);
    }

    public function apiStore(Request $request)
    {
        $this->validate($request, [
            'text' => 'required|min:3|max:1000',
            'user_id' => 'required',
            'post_id' => 'required',
        ]);

        $c = new Comment();
        $c->text = $request['text'];
        $c->user_id = $request['user_id'];
        $c->post_id = $request['post_id'];
        $c->save();

        $post = Post::findOrFail('post_id');
        $owner = User::findOrFail($post->user_id);
        if($c->user_id !== $owner) {
            $c->post->user_id->notify(new Newcomment);
        }
        return $c;
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Comment $comment)
    {
        return view('comments.show', ['comment' => $comment]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Comment $comment)
    {
        return view('comments.edit', ['comment' => $comment]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Comment $comment)
    {
        $this->validate($request, [
            'comment' => 'required|min:3|max:1000',
        ]);

        $comment->text = $request->get('text');
        $comment->save();

        return redirect()->route('posts.show', $comment->post)->with('message', 'Comment has been updated!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Comment $comment)
    {
        $post = $comment->post;
        $comment->delete();
        return redirect()->route('posts.show', ['post' => $post])
            ->with('message', 'The comment has been deleted!');
    }
}
