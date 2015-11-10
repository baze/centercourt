<h4>Spieldauer
    <small>in Stunden</small>
</h4>

<p>
    <select class="form-control"
            data-ng-options="item for item in durations"
            data-ng-model="reservation.duration"
            data-ng-change="drawTempReservation()">
    </select>
</p>