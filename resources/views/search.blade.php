@extends('layout')
@section('content')

    <div class="main-posts">
        <div>
            <h3 style="text-decoration: underline;text-underline-position: under;">Main posts</h3>
        </div>
        @if(!is_null($main_posts->first()))
            @foreach($main_posts as $post)
                <div style="padding-left: 4%">
                    <div class="post" onclick="location.href='/posts/{{$post->id}}'">
                        <p class="title">{{$post->title}}</p>
                        <p>{{$post->description}}</p>
                    </div>
                </div>
            @endforeach
        @else
            <div style="padding:6%;text-align: center;width:100%">
                <h2>There's no Posts</h2>
            </div>
        @endif
    </div>

@endsection
