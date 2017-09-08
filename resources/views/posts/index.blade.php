@extends('app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-10 col-md-offset-1">
                <div class="panel panel-default">
                    <div class="panel-heading">Hier können Sie Nachrichten austauschen.</div>

                    <div class="panel-body">

                        <a href="{{ route('posts.create') }}" class="btn btn-primary">Neue Nachricht erstellen</a>

                        <h1>Nachrichten</h1>

                        @if($posts->count())
                            <div class="table-responsive">
                                <table class="table">
                                    <thead>
                                    <tr>
                                        <th width="20%">Titel</th>
                                        <th width="40%">Inhalt</th>
                                        <th>Veröffentlicht</th>
                                        <th>Autor</th>
                                        <th class="text-right">Status</th>
                                    </tr>
                                    </thead>
                                    @foreach($posts as $post)
                                        <tr>
                                            <td>
                                                <a href="{{ route('posts.show', $post->id) }}">
                                                    {{ $post->title }}
                                                </a>
                                            </td>
                                            <td>
                                                <a href="{{ route('posts.show', $post->id) }}">
                                                    {{ $post->excerpt }}
                                                </a>
                                            </td>

                                            <td>{{ $post->published_at }}</td>
                                            <td>{{ $post->author->name }}</td>


                                            <td class="text-right">
                                                {!! Form::open(array('method' => 'DELETE', 'route' => ['posts.destroy', $post->id])) !!}
                                                @if($post->trashed())
                                                    {!! Form::submit('gesperrt', ['class' => 'btn btn-danger btn-xs']) !!}
                                                @else
                                                    {!! Form::submit('veröffentlicht', ['class' => 'btn btn-success btn-xs']) !!}
                                                @endif

                                                {{--{!! link_to_route('posts.edit', 'Bearbeiten', [$post->id], ['class' => 'btn btn-warning btn-xs']) !!}--}}

                                                {!! Form::close() !!}
                                            </td>
                                        </tr>
                                    @endforeach
                                </table>
                            </div>
                        @else
                            <span class="help-block">Keine Nachrichten vorhanden.</span>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
