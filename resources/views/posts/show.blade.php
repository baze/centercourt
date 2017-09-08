@extends('app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-10 col-md-offset-1">
                <div class="panel panel-default">
                    <div class="panel-heading">{{ $post->published_at }} - {{$post->author->name }}</div>

                    <div class="panel-body">

                        <h1>{{ $post->title }}</h1>

                        <div>
                            {!! $post->content !!}
                        </div>

                        <hr>

                        <a href="{{ route('posts.index') }}" class="btn btn-default">Zurück</a>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
