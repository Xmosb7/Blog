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
                <label>You are logged in as `User`!</label><br>
                <label>You'r plan is `{{ $plan->name }}`!</label>
            </div>
            <div class="right-side-avatar">
                <label>{{'name:  '.auth()->user()->name }}</label><br>
                <label>{{'E-mail:  '.auth()->user()->email }}</label><br>
                <label>{{'Created_at:  '.auth()->user()->created_at }}</label><br>
            </div>
        </div>
    </div>
    <hr style="width: 80%;margin-top: 15%;">
    <div class="statics">
        <h4>Blog statics</h4>
        <div style="padding-left: 4%">
            <label>number of users who signed up = {{$no_users}}</label><br>
            <label>number of interactions is {{$no_visits}} times.</label>


            @if(!is_null($max_post_visit_post))
                <h4>post with the most interaction is </h4>
                <div style="padding-left: 4%">
                    <div class="post" onclick="location.href='/posts/{{$max_post_visit_post->id}}'">
                        <p class="title">{{$max_post_visit_post->title}}</p>
                        <p>{{$max_post_visit_post->body}}</p>
                    </div>
                </div>
                <br>
            @endif

            <label>number of reaches for this post is 15</label><br>
        </div>

    </div>
    <div class="your-posts">

        @if(!is_null($user_posts->first()))
            <h4>your posts</h4>
            <label>number of posts = {{$no_posts}}</label><br>
        @foreach($user_posts as $post)
                <div style="padding-left: 4%">
                    <div class="post" onclick="location.href='/posts/{{$post->id}}'">
                        <p class="title">{{$post->title}}</p>
                        <p>{{$post->body}}</p>
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
