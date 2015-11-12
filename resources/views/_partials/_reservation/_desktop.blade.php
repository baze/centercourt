<div class="row"
     data-ng-controller="TableController"
     data-ng-init="init()">

    @include('_partials._reservation._context-menu')

    <div class="col-md-8">

        <table class="courts-table table table-bordered">
            <thead>
            <tr>
                <th>Zeit</th>

                @foreach($courts as $court)
                    <th class="court court-{{ $court->type }}">
                        <label for="court_id_{{ $court->id }}">{{ $court->name }}</label>
                        @if(Auth::check())
                            <input type="radio"
                                   name="court_id"
                                   value="{{ $court->id }}"
                                   id="court_id_{{ $court->id }}"
                                   data-ng-model="reservation.courtId"
                                   data-ng-click="drawTempReservation()"
                            />
                        @endif
                    </th>
                @endforeach
            </tr>
            </thead>
            <tbody>
            @for($i = 0; $i < $timeSpan * 2; $i++)
                <?php $time = ( $minTime + $i / 2 ); ?>
                <tr data-time="{{ $time }}">
                    <td>{{ format_time($time)  }}</td>
                    @foreach($courts as $court)
                        <td class="court court-{{ $court->type }}"

                            @if(Auth::check())
                            data-ng-mousedown="selectStartTime({{ $court->id }}, {{ $time }})"
                            data-ng-mouseup="endSelection()"
                            data-ng-mouseenter="selectEndTime({{ $court->id }}, {{ $time }})"
                            @endif

                            data-court-id="{{ $court->id }}">
                            <div class="reservationWrapper">
                                <span
                                @if(Auth::check())
                                    data-ng-mouseover="showReservationInfoPopover($event, '{{ url('reservations') }}', '{{ csrf_token() }}')"
                                    data-container="body"
                                    data-placement="right"
                                    data-trigger="click"
                                    data-content=""
                                    data-title="Reservierungs-Daten"
                                    data-html="true"
                                @endif
                                ></span>
                            </div>
                        </td>
                    @endforeach
                </tr>
            @endfor
            </tbody>
        </table>

        @include('_partials._legend')
    </div>
    <div class="col-md-4">
        <div class="well">
            <div class="datetimepicker-startDate"></div>
        </div>

        @if(Auth::check())
            @include('_partials._reservation._alert')

            <div class="well">
                @include('_partials._startTime')
                @include('_partials._duration')
                @include('_partials._recurring')
            </div>

            <div class="well">
                @include('_partials._reservation._summary')
            </div>
        @endif

    </div>

</div>




