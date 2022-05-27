@extends('layout')

@section('content')



    <div class="row">
        <div style="text-align: left">
            <h1>{{ $post->title }}</h1>
        </div>
        <div style="display: inline-block;width: 100%">
            <label style="float:right;width:98%;color: gray;font-size: 0.9vw;"> Writer:
                {{ \Illuminate\Support\Facades\DB::table('users')->where('id', $post->user_id)->first()->name }}, post has
                {{ $post->visits }} visits.</label>
        </div>
        <div style="padding-left: 4%">

            <div>
                @if ($errors->any())
                    <h2>{{ $errors->first() }}</h2>
                @endif
                <a class="btn btn-danger" onclick="return confirm('Are you sure?')"
                    href="{{ route('post.delete', $post->id) }}"><i class="fa fa-trash"></i>Delete</a>

            </div>

            <div>

                <a href="{{ route('post.editForm', $post->id) }}"><i class="fa fa-trash"></i>Edit</a>
            </div>

            <p class="lead">{!! $post->body !!}</p>
            <hr>
            <div id="backend-comments" style="margin-top: 3%;text-align: left">
                @if (!is_null($comments->first()))
                    <h4>There is {{ $comments->count() }} comments</h4>

                    @foreach ($comments as $comment)
                        <div style="padding: 1% 0 0 2%; margin-left: 2%;text-align: left">
                            <strong>{{ \Illuminate\Support\Facades\DB::table('users')->where('id', $comment->user_id)->first()->name }}</strong>
                            <p style="padding-left: 4%">{{ $comment->body }}</p>
							<a href="{{ route('post.editForm', $post->id) }}"><i class="fa fa-trash"></i>Edit</a>
							<a href="{{ route('post.deleteComment', $post->id) }}"><i class="fa fa-trash"></i>Delete</a>
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
