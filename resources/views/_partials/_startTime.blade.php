<h4>Spielbeginn</h4>

<p>
        <select class="form-control"
                data-ng-options="item.value as item.label for item in startTimes"
                data-ng-model="reservation.startTime"
                data-ng-change="drawTempReservation()">
        </select>
</p>