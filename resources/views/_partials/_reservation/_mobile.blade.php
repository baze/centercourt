<div class="row"
     data-ng-controller="SliderController"
     @if(Auth::check())
     data-ng-init="init(isAdmin=true)"
     @else
     data-ng-init="init()"
        @endif
>
    <div class="col-sm-8">

        <div class="flexslider courts">
            <ul class="slides">
                @foreach($courts as $court)
                    <li>
                        <img src="{{ URL::asset('/img/court'.$court->id.'.jpg') }}"/>
                    </li>
                @endforeach
            </ul>
        </div>

        <span class="court-preview-title">Platzbelegung:</span>
        <div class="court-preview">
            @for($i = 0; $i < $timeSpan * 2; $i++)
                <?php $time = ( $minTime + $i / 2 ); ?>

                <div class="reservationWrapper" data-time="{{ $time }}">
                    <span></span>
                </div>

            @endfor
        </div>
        <div class="court-preview-time">
            <span>7 Uhr</span>
            <span>14 Uhr</span>
            <span>23 Uhr</span>
        </div>

        {{--<input type="date" class="form-control"
               min="{{ $minDate->format('Y-m-d') }}"
               max="{{ $maxDate->format('Y-m-d') }}"
               data-ng-model="reservation.date" />--}}

        <div class="well">
            <div class="datetimepicker-startDate"></div>
        </div>

        <div class="well">
            <div class="row">
                <div class="col-sm-6">
                    @include('_partials._startTime')
                </div>
                <div class="col-sm-6">
                    @include('_partials._duration')
                </div>
            </div>

            @include('_partials._recurring')
        </div>

    </div>

    <div class="col-sm-4">

        @include('_partials._reservation._alert')

        <div class="well">
            @include('_partials._reservation._form')
        </div>

        @include('_partials._reservation._conditions')

    </div>
</div>



