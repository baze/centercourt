<h4>Dauerreservierungen</h4>
<label class="form-label" for="recurring">
        <input id="recurring"
               type="checkbox"
               data-ng-model="reservation.recurring">
        Dauerreservierung
</label>

<div data-ng-show="reservation.recurring">
    <p>
        <select class="form-control"
                data-ng-options="item.value as item.label for item in recurringTypes"
                data-ng-model="reservation.recurringType"
                data-ng-change="drawTempReservation()">
        </select>
    </p>

    <p>
        <select class="form-control"
                data-ng-options="item.value as item.label for item in recurringIntervals"
                data-ng-model="reservation.recurringInterval"
                data-ng-change="drawTempReservation()">
        </select>
    </p>

    <div data-ng-show="reservation.recurringInterval == 'weekly'">
        <p>
            <select class="form-control"
                    data-ng-options="item.value as item.label for item in recurringIntervalsWeeks"
                    data-ng-model="reservation.recurring_interval_weeks"
                    data-ng-change="drawTempReservation()">
            </select>
        </p>
    </div>

    <label class="form-label">Wiederholung endet am:</label>
    <div class="datetimepicker-endDate"></div>
</div>