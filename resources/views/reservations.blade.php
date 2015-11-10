@extends('app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-10 col-md-offset-1">
                <div class="panel panel-default">
                    <div class="panel-heading">Bitte wählen Sie einen freien Zeitraum auf einem unserer {{ count($courts) }} Plätze aus.</div>

                    <div class="panel-body">

                        @if( $detect->isMobile())
                            @include('_partials._reservation._mobile')
                        @else
                            @include('_partials._reservation._desktop')
                        @endif

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
