<div class="row" data-ng-controller="SliderController" data-ng-init="init()">
    <div class="col-sm-8">

        <div class="flexslider courts">
            <ul class="slides">
                <li>
                    <img src="{{ URL::asset('/img/court1.jpg') }}"/>
                </li>
                <li>
                    <img src="{{ URL::asset('/img/court2.jpg') }}"/>
                </li>
                <li>
                    <img src="{{ URL::asset('/img/court3.jpg') }}"/>
                </li>
                <li>
                    <img src="{{ URL::asset('/img/court4.jpg') }}"/>
                </li>
                <li>
                    <img src="{{ URL::asset('/img/court5.jpg') }}"/>
                </li>
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

        @if(Auth::check())
            <div class="well">
                <div class="datetimepicker-startDate"></div>
            </div>
        @endif

        @if(Auth::check())
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

        @endif

    </div>

    <div class="col-sm-4">

        @if(Auth::guest())
            <div class="well">
                <div class="datetimepicker-startDate"></div>
            </div>
        @endif

        @if(Auth::check())
            @include('_partials._reservation._alert')

            <div class="well">
                @include('_partials._reservation._form')
            </div>
        @endif

    </div>
</div>



