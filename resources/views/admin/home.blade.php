@extends('layouts.app')

@section('content')

    <style>
        .card {
            position: relative;
            display: flex;
            flex-direction: column;
            min-width: 0;
            word-wrap: break-word;
            background-color: #fff;
            background-clip: border-box;
            border: 1px solid rgba(0, 0, 0, 0.125);
            border-radius: 0.25rem;
        }

        .card-header:first-child {
            border-radius: calc(0.25rem - 1px) calc(0.25rem - 1px) 0 0;
        }

        .card-header {
            padding: 0.5rem 1rem;
            margin-bottom: 0;
            background-color: rgba(0, 0, 0, 0.03);
            border-bottom: 1px solid rgba(0, 0, 0, 0.125);
        }

        thead, tbody, tfoot, tr, td, th {
            border-color: inherit;
            border-style: solid;
            border-width: 0;
        }



    </style>

    @php
        $plan = \Illuminate\Support\Facades\DB::table('plans')->where('id',auth()->user()->plan_id )->first();
    @endphp
    <div style="margin:auto;width:70%">

        <div class="container" style="padding-top: 2%;text-align: center;">
            <div class="avatar-container" style="text-align: center">
                <img class="avatar-img" src="{{auth()->user()->img}}"/>
                <h3>Welcome, {{auth()->user()->name}}</h3>
            </div>
            <div>
                <div class="left-side-avatar">
                    <div style="padding-left:45%;text-align: left">
                        <label>You're logged in as <strong>User</strong>.</label><br>
                        <label>You're plan is <strong>{{ $plan->name }}</strong>.</label><br>
                        <label>there is <strong>{{$no_visits}}</strong> visits.</label><br>
                        <label>there is <strong>{{$no_users}}</strong> users who signed up.</label>
                    </div>

                </div>
                <div class="right-side-avatar">
                    <label><strong>name:</strong>{{auth()->user()->name }}</label><br>
                    <label><strong>E-mail:</strong>{{auth()->user()->email }}</label><br>
                    <label><strong>Created at:</strong> {{auth()->user()->created_at }}</label><br>
                </div>
            </div>
        </div>
        <hr style="margin-top: 12%;">
        <div class="statics">
            <h2>Blog statics</h2>
            <div style="padding-left: 4%">
                @if(!is_null($max_post_visit_post))
                    <h4>Your most visited post with {{$max_post_visit_post->visits}} visits</h4>
                    <div style="padding-left: 4%">
                        <div class="post" onclick="location.href='/posts/{{$max_post_visit_post->id}}'">
                            <p class="title">{{$max_post_visit_post->title}}</p>
                            <p>{{$max_post_visit_post->description}}</p>
                        </div>
                    </div>
                    <br>
                @endif
            </div>
            <div style="padding-left: 8%">
                @if(!is_null($users->first()))
                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-header">{{ __('Users List') }}</div>
                            <div style="padding:1%;text-align: center;width:100%">
                                <table style="width:98%">
                                    <tr>
                                        <th>id</th>
                                        <th>name</th>
                                        <th>email</th>
                                        <th>plan</th>
                                        <th>created at</th>
                                        <th>updated at</th>
                                        <th></th>
                                    </tr>
                                    @foreach($users as $user)
                                        <tr>
                                            <td>
                                                {{$user->id}}
                                            </td>
                                            <td>
                                                {{$user->name}}
                                            </td>
                                            <td>
                                                {{$user->email}}
                                            </td>
                                            <td style="word-wrap: normal">
                                                {{\Illuminate\Support\Facades\DB::table('plans')->where('id',$user->plan_id)->get()[0]->name}}
                                            </td>
                                            <td style="word-wrap: normal">
                                                {{$user->created_at}}
                                            </td>
                                            <td style="word-wrap: normal">
                                                {{$user->updated_at}}
                                            </td>
                                            <td>
                                                <a class="btn btn-danger"
                                                   href="{{ url('/user/delete/'.$user->id)}}">Delete</a>
                                            </td>
                                        </tr>
                                    @endforeach
                                </table>

                            </div>
                        </div>
                    </div>
                @else
                    <div style="padding:6%;text-align: center;width:100%">
                        <h2>There are no other users.</h2>
                    </div>
                @endif
            </div>
            <br>
            <div style="padding-left: 8%">
                @if(!is_null($orders->first()))
                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-header">{{ __('Primary plan orders') }}</div>
                            <div style="padding:1%;text-align: center;width:100%">
                                <table style="width:98%">
                                    <tr>
                                        <th>id</th>
                                        <th>user id</th>
                                        <th>status</th>
                                        <th>created at</th>
                                        <th>updated at</th>
                                        <th></th>
                                        <th></th>
                                        <th></th>

                                    </tr>
                                    @foreach($orders as $order)
                                        <tr>
                                            <td>
                                                {{$order->id}}
                                            </td>
                                            <td>
                                                {{$order->user_id}}
                                            </td>
                                            <td>
                                                {{$order->status}}
                                            </td>
                                            <td style="word-wrap: normal">
                                                {{$order->created_at}}
                                            </td>
                                            <td style="word-wrap: normal">
                                                {{$order->updated_at}}
                                            </td>
                                            <td>
                                                <a class="btn btn-dark"
                                                   href="{{ url('/get-premium-plan/approve\/').$order->id."?user=".$order->user_id }}">Verify</a>
                                            </td>
                                            <td>
                                                <a class="btn btn-warning"
                                                   href="{{ url('/get-premium-plan/cancel\/').$order->id}}">Cancel</a>
                                            </td>
                                            <td>
                                                <a class="btn btn-danger"
                                                   href="{{ url('/get-premium-plan/delete\/').$order->id}}">Delete</a>
                                            </td>
                                        </tr>
                                    @endforeach
                                </table>

                            </div>
                        </div>
                    </div>
                @else
                    <div style="padding:6%;text-align: center;width:100%">
                        <h2>No one Requested premium plan.</h2>
                    </div>
                @endif
            </div>


        </div>
        <div class="your-posts" style="padding-left:4%;">


            @if(!is_null($user_posts->first()))
                <h4>Your posts</h4>
                <label>number of posts = {{$no_posts}}</label><br><br>
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
                    <h2>You didn't post anything yet.</h2>
                </div>
            @endif


        </div>

    </div>

@endsection
