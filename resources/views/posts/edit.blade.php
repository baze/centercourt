@extends('app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-10 col-md-offset-1">
                <div class="panel panel-default">
                    <div class="panel-heading">Nachricht bearbeiten</div>

                    <div class="panel-body">


                        <div class="well" data-ng-controller="HolidaysController" data-ng-init="init()">

                            {!! Form::open(array('method' => 'PATCH', 'route' => ['posts.update', $post->id])) !!}

                            <div class="form-group">
                                {!! Form::label('title', 'Titel') !!}
                                {!! Form::text('title', $post->title, ['class' => 'form-control']) !!}
                            </div>

                            <div class="form-group">
                                {!! Form::label('content', 'Inhalt') !!}
                                {!! Form::textarea('content', $post->content, ['class' => 'form-control']) !!}
                            </div>

                            {!! Form::submit('Aktualisieren', ['class' => 'btn btn-success']) !!}

                            {!! Form::close() !!}
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
