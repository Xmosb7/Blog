@extends('layout')

@section('content')
    <div class="container">
        @if ($errors->any())
            <h2>{{ $errors->first() }}</h2>
        @endif
        <br><br>
        <form action="{{ route('post.add') }}" method="get">
            <div class='title'>
                <label for="Title">Title</label>

                <input class="form" type="text" id="title" name="Title" value="{{ $request->title }}">
            </div>
            <br><br>
            <div class='des'>
                <label for="Description">Description</label>
                <textarea id="form" name="Description">{{ $request->description }}</textarea>
                <br><br>
            </div>
            <div class='body'>
                <label for="Body">Body</label>
                <textarea id="form" name="Body">{{ $request->body }}</textarea>

            </div>

            <input class="form" type="submit" value="Submit">
        </form>

    </div>
@endsection
