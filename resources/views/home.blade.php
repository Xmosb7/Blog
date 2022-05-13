@extends('layout')

@section('content')
    <div class="container" style="padding-top: 5%;text-align: center;">
        <div class="avatar-container" style="text-align: center">
            <img class="avatar-img" src="http://i.stack.imgur.com/Dj7eP.jpg"/>
            <h3>Welcome, {{auth()->user()->name}}</h3>
        </div>
        <div>
            <div class="left-side-avatar">
                <label>'You are logged in as `User`!'</label>
            </div>
            <div class="right-side-avatar">
                <label>{{'name:  '.auth()->user()->name }}</label><br>
                <label>{{'E-mail:  '.auth()->user()->email }}</label><br>
                <label>{{'Created_at:  '.auth()->user()->created_at }}</label><br>
            </div>
        </div>
    </div>
    <hr style="width: 80%;margin-top: 15%;">
    <div class="your-posts">
        <h4>your posts</h4>
        <div style="padding-left: 4%">
            <div class="post" onclick="location.href='#'">
                <p class="title">Title</p>
                <p>Description ttttttttt tttttttttttttt dddddddddddddd ppppppppppppppp mmmmmmmmmmmmmmmmmmmm</p>
            </div>
        </div>
        <div style="padding-left: 4%">
            <div class="post" onclick="location.href='#'">
                <p class="title">Title</p>
                <p>Description ttttttttt tttttttttttttt dddddddddddddd ppppppppppppppp mmmmmmmmmmmmmmmmmmmm</p>
            </div>
        </div>
    </div>
    <div class="statics">
        <h4>Blog statics</h4>
        <div style="padding-left: 4%">
            <label>no.users who signed up = 50</label><br>
            <label>no.posts = 10</label><br>
            <label>post with the most 	interaction is <strong>Title</strong></label><br>
            <label>number of reaches for this post is 15</label><br>
        </div>

    </div>


@endsection
