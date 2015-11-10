@extends('app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-10 col-md-offset-1">
                <div class="panel panel-default">
                    <div class="panel-heading">Hier können Sie die Ferienzeiten verwalten.</div>

                    <div class="panel-body">

                        <h1>Neue Ferienzeit eintragen</h1>

                        {!! Form::open(array('method' => 'POST', 'route' => ['holidays.store'])) !!}

                        <p>
                            {!! Form::text('start_date', null, ['class' => 'form-control', 'placeholder' => 'Von (YYYY-MM-DD)']) !!}
                        </p>

                        <p>
                            {!! Form::text('end_date', null, ['class' => 'form-control', 'placeholder' => 'Bis (YYYY-MM-DD)']) !!}
                        </p>

                        {!! Form::submit('Eintragen', ['class' => 'btn btn-success btn-xs']) !!}
                        {!! Form::close() !!}


                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
