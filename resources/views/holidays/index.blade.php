@extends('app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-10 col-md-offset-1">
                <div class="panel panel-default">
                    <div class="panel-heading">Hier können Sie die Ferienzeiten verwalten.</div>

                    <div class="panel-body">

                        <h1>Ferienzeiten</h1>

                        @if($holidays->count())
                            <div class="table-responsive">
                                <table class="table">
                                    <thead>
                                    <tr>
                                        <th>Von</th>
                                        <th>Bis</th>
                                        <th class="text-right">Aktionen</th>
                                    </tr>
                                    </thead>
                                    @foreach($holidays as $holiday)
                                        <tr>
                                            <td>{{ $holiday->start_date }}</td>
                                            <td>{{ $holiday->end_date }}</td>

                                            <td class="text-right">
                                                {!! Form::open(array('method' => 'DELETE', 'route' => ['holidays.destroy', $holiday->id])) !!}
{{--                                                {!! link_to_route('holidays.edit', 'Bearbeiten', [$holiday->id], ['class' => 'btn btn-warning btn-xs']) !!}--}}
                                                {!! Form::submit('löschen', ['class' => 'btn btn-danger btn-xs']) !!}
                                                {!! Form::close() !!}
                                            </td>
                                        </tr>
                                    @endforeach
                                </table>
                            </div>
                        @else
                            <span class="help-block">Keine Ferienzeiten eingetragen.</span>
                        @endif

                        <hr>

                        <div>
                            <h3>Neue Ferienzeit eintragen</h3>

                            {!! Form::open(array('method' => 'POST', 'route' => ['holidays.store'])) !!}

                            <div class="form-group">
                                <label for="startDate">Von</label>
                                {!! Form::text('start_date', null, ['id' => 'startDate', 'class' => 'form-control', 'placeholder' => 'YYYY-MM-DD']) !!}
                            </div>

                            <div class="form-group">
                                <label for="endDate">Von</label>
                                {!! Form::text('end_date', null, ['id' => 'endDate', 'class' => 'form-control', 'placeholder' => 'YYYY-MM-DD']) !!}
                            </div>

                            {!! Form::submit('Eintragen', ['class' => 'btn btn-success']) !!}

                            {!! Form::close() !!}
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
