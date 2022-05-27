@extends('layout')

@section('content')

<style>

    .btn {
        display: inline-block;
        font-weight: 400;
        line-height: 1.6;
        color: #212529;
        text-align: center;
        text-decoration: none;
        vertical-align: middle;
        cursor: pointer;
        -webkit-user-select: none;
        -moz-user-select: none;
        -ms-user-select: none;
        user-select: none;
        background-color: transparent;
        border: 1px solid transparent;
        padding: 0.375rem 0.75rem;
        font-size: 0.9rem;
        border-radius: 0.25rem;
        transition: color 0.15s ease-in-out, background-color 0.15s ease-in-out, border-color 0.15s ease-in-out, box-shadow 0.15s ease-in-out;
    }
    .btn-warning {
        color: #000;
        background-color: #ffc107;
        border-color: #ffc107;
    }
    .btn-warning:hover {
        color: #000;
        background-color: #ffca2c;
        border-color: #ffc720;
    }
    .btn-dark {
        color: #fff;
        background-color: #212529;
        border-color: #212529;
    }
    .btn-dark:hover {
        color: #fff;
        background-color: #1c1f23;
        border-color: #1a1e21;
    }
    .btn-sm, .btn-group-sm > .btn {
        padding: 0.25rem 0.5rem;
        font-size: 0.7875rem;
        border-radius: 0.2rem;
    }
</style>

    <div class="row">
        <div style="text-align: left">
            <h1>{{ $post->title }}</h1>
        </div>
        <div style="display: inline-block;width: 100%">
            <label style="float:right;width:98%;color: gray;font-size: 0.9vw;"> Writer:
                {{ \Illuminate\Support\Facades\DB::table('users')->where('id', $post->user_id)->first()->name }}, post
                has
                {{ $post->visits }} visits.</label>
        </div>
        <div style="padding-left: 4%">

            <div>
                @if ($errors->any())
                    <h4>{{ $errors->first() }}</h4>
                @endif
            </div>
            <div>
                <a class="btn btn-dark btn-sm"
                   href="{{ route('post.editForm', $post->id) }}" style="width: 8%;">Edit</a>
                <a class="btn btn-warning btn-sm" onclick="return confirm('Are you sure?')"
                href="{{ route('post.delete', $post->id) }}">Delete</a>
            </div>

            <p class="lead">{!! $post->body !!}</p>
            <hr>
            <div id="backend-comments" style="text-align: left">
                <form action="{{ route('post.addcomment') }}" method="get">

                    <input class="form" type="hidden" id="id" name="Id" value="">
                    <label for="body">Add Comment</label><br>
                    <div class='body'>
                        <input type="hidden" id="post_id" name="post_id" value= {{ $post->id }}>
                        <input style="width: 85%;height: 4vw;" class="form" type="text" id="comment" name="comment">
                        <input  class="btn btn-dark " type="submit" value="Submit" style="width:12%;padding: 2.5% 0 2.5% 0;">
                    </div>

                </form>
                @if (!is_null($comments->first()))
                    <h4>There is {{ $comments->count() }} comments</h4>

                    @foreach ($comments as $comment)
                        <div style="padding: 1% 0 0 2%; margin-left: 2%;text-align: left">
                            <strong>{{ \Illuminate\Support\Facades\DB::table('users')->where('id', $comment->user_id)->first()->name }}</strong>
                            <p style="padding-left: 4%">{{ $comment->body }}</p>
                            <a href="{{ route('post.editCommentForm', $comment->id) }}"><i class="fa fa-trash"></i>Edit</a>
                            <a href="{{ route('post.deleteComment', $comment->id) }}"><i class="fa fa-trash"></i>Delete</a>
                            <hr style="width: 100%;opacity: 45%;">

                        </div>
                    @endforeach
                @else
                    <div style="padding:6%;text-align: center;width:100%">
                        <h2>There is no comments yet.</h2>
                    </div>
                @endif

            </div>
        </div>


        <div class="col-md-8">


            <div class="col-md-4">
                <div class="well">

                </div>
            </div>
        </div>

@endsection
