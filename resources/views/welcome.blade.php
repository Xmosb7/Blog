@extends('layout')
@section('content')
    <div class="pinned-posts" >
        <div>
            <h3 style="text-decoration: underline;text-underline-position: under;">pinned posts</h3>
        </div>
        <div style="padding-left: 4%">
            <div class="post" onclick="location.href='#'">
                <p class="title">Title</p>
                <p>Description ttttttttt tttttttttttttt dddddddddddddd ppppppppppppppp mmmmmmmmmmmmmmmmmmmm</p>
            </div>
        </div>
    </div>
<hr>

    <div class="main-posts">
        <div>
            <h3 style="text-decoration: underline;text-underline-position: under;">main posts</h3>
        </div>
        <div style="padding-left: 4%">
            <div class="post" onclick="location.href='#'">
                <p class="title">Title</p>
                <p>Description ttttttttt tttttttttttttt dddddddddddddd ppppppppppppppp mmmmmmmmmmmmmmmmmmmm</p>
            </div>
        </div>
    </div>

@endsection
