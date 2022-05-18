@extends('layout')

@section('content')

    @php
        $plan = \Illuminate\Support\Facades\DB::table('plans')->where('id',auth()->user()->plan_id )->first();
    @endphp
    <div class="container" style="padding-top: 5%;text-align: center;">
        <div class="avatar-container" style="text-align: center">
            <img class="avatar-img" src="{{auth()->user()->img}}"/>
            <h3>Welcome, {{auth()->user()->name}}</h3>
        </div>
        <div>
            <div class="left-side-avatar">
                <label>You're logged in as <strong>User</strong>.</label><br>
                <label>You're plan is <strong>{{ $plan->name }}</strong>.</label>
            </div>
            <div class="right-side-avatar">
                <label><strong>name:</strong>{{auth()->user()->name }}</label><br>
                <label><strong>E-mail:</strong>{{auth()->user()->email }}</label><br>
                <label><strong>Created at:</strong> {{auth()->user()->created_at }}</label><br>
            </div>
        </div>
    </div>
    <hr style="width: 80%;margin-top: 12%;">
    <div class="statics">
        @if(!is_null($max_post_visit_post))
            <h2>Blog statics</h2>
            <div style="padding-left: 4%">

                <h4>Your most visited post with {{$max_post_visit_post->visits}} visits</h4>
                <div style="padding-left: 4%">
                    <div class="post" onclick="location.href='/posts/{{$max_post_visit_post->id}}'">
                        <p class="title">{{$max_post_visit_post->title}}</p>
                        <p>{{$max_post_visit_post->description}}</p>
                    </div>
                </div>
                <br>
            </div>

        @endif


    </div>


    <div class="your-posts" style="padding-left:4%;">

        @if(!is_null($user_posts->first()))
            <h4>your posts</h4>
            <label>number of posts = {{$user_posts->count()}}</label><br><br>
            @foreach($user_posts as $post)
                <div style="padding-left: 4%">
                    <div class="post" onclick="location.href='/posts/{{$post->id}}'">
                        <p class="title">{{$post->title}}</p>
                        <p>{{$post->description}}</p>
                    </div>
                </div>
            @endforeach


        @else
            <div style="padding:6%;text-align: center;width:100%">
                <h2>you didn't post anything yet.</h2>
            </div>
        @endif


    </div>



@endsection
