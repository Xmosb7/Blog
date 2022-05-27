@extends('layout')

@section('content')
    <div class="container">
        @if ($errors->any())
            <h2>{{ $errors->first() }}</h2>
        @endif
        <br><br>
        <form action="{{ route('post.editComment', $comment->id) }}" method="get">

            <input class="form" type="hidden" id="id" name="Id" value="{{ $request->id }} {{ $comment->id }}">

            <div class='body'>
                <label for="Body">Body</label>
                <textarea id="form" name="Body">{{ $request->body }}{{ $comment->body }}</textarea>
                <input class="form" type="submit" value="Submit">
            </div>
        </form>

    </div>
@endsection
