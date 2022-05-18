@extends('layout')

@section('content')



	<div class="row">
		<div class="col-md-8">
			<h1>{{ $post->title }}</h1>
			
			<p class="lead">{!! $post->body !!}</p>

			<hr>
			

			<div id="backend-comments" style="margin-top: 50px;">
		    <h3>Comments <small>{{ $comments->count() }} total</small></h3>



					
		    @foreach ($comments as $comment)
            <strong>Mosba7</strong>
            <p>{{ $comment->body }}</p>
		    @endforeach

		</div>

		<div class="col-md-4">
			<div class="well">






			</div>
		</div>
	</div>

@endsection
