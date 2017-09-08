<div class="row"
     data-ng-controller="TableController"
     @if(Auth::check())
     data-ng-init="init(isAdmin=true)"
     @else
     data-ng-init="init()"
        @endif
>

    @include('_partials._reservation._context-menu')

    <div class="col-md-8">

        <table class="courts-table table table-bordered">
            <thead>
            <tr>
                <th>Zeit</th>

                @foreach($courts as $court)
                    <th class="court court-{{ $court->type }}">
                        <label for="court_id_{{ $court->id }}">

                            {{--@if(Auth::check())--}}
                            <input type="radio"
                                   name="court_id"
                                   value="{{ $court->id }}"
                                   id="court_id_{{ $court->id }}"
                                   data-ng-model="reservation.courtId"
                                   data-ng-click="drawTempReservation()"
                            />
                            {{--@endif--}}

                            {{ $court->name }}
                        </label>
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

                            {{--@if(Auth::check())--}}
                            data-ng-mousedown="selectStartTime({{ $court->id }}, {{ $time }})"
                            data-ng-mouseup="endSelection()"
                            data-ng-mouseenter="selectEndTime({{ $court->id }}, {{ $time }})"
                            {{--@endif--}}

                            data-court-id="{{ $court->id }}">
                            <div class="reservationWrapper">
                                <span
                                        @if(Auth::check())
                                        data-ng-mouseover="highlightReservation($event)"
                                        data-ng-click="showReservationInfoPopover($event, '{{ url('reservations') }}')"
                                        data-placement="right"
                                        data-trigger="click"
                                        data-content=""
                                        data-title="Reservierungs-Daten"
                                        data-html="true"
                                        @endif
                                >
                                </span>
                            </div>
                        </td>
                    @endforeach
                </tr>
            @endfor
            </tbody>
        </table>

        @if(Auth::check())
            @include('_partials._legend')
        @endif
    </div>
    <div class="col-md-4">
        <div class="well">
            <div class="datetimepicker-startDate"></div>
        </div>

        @include('_partials._reservation._alert')

        <div class="well">
            @include('_partials._startTime')
            @include('_partials._duration')
            @include('_partials._recurring')
        </div>

        <div class="well">
            @include('_partials._reservation._summary')
        </div>

        @include('_partials._reservation._conditions')

    </div>

    <!-- Modal -->
    <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                                aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title" id="myModalLabel">Wirklich löschen?</h4>
                </div>
                <div class="modal-body">
                    Wollen Sie diese Reservierung wirklich löschen? Diese Aktion kann nicht widerrufen werden.
                </div>
                <div class="modal-footer">
                    <form action="@{{ reservationDeleteAction }}" method="POST">
                        <input name="_method" type="hidden" value="DELETE">
                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Abbrechen</button>
                        <button type="submit" class="btn btn-danger">Löschen</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

</div>




