<h4>Reservierung für</h4>

<form name="reservationForm" data-ng-submit="storeReservation()">

    {!! Form::token() !!}

    <p><input type="text" name="first_name" class="form-control"
              data-ng-model="reservation.first_name"
              placeholder="Vorname"/></p>

    <p><input type="text" name="last_name" class="form-control"
              data-ng-model="reservation.last_name"
              placeholder="Nachname (Optional)"/></p>

    {{--<p><input type="email" name="email" class="form-control"
              data-ng-model="reservation.email"
              placeholder="E-Mail" /></p>--}}

    {{--<p><input type="tel" name="phone" class="form-control"
              data-ng-model="reservation.phone"
              placeholder="Telefon"/></p>--}}

    <p>
        {{--<button class="btn btn-primary btn-block" type="submit"
                data-ng-disabled="conflict || ! reservation.first_name || ! reservation.last_name || ! reservation.phone || ! reservation.email || reservationForm.email.$error.email || ! reservation.courtId || ! reservation.startTime || ! reservation.duration || sending">--}}

        <button class="btn btn-primary btn-block" type="submit"
                data-ng-disabled="conflict || ! reservation.first_name || reservationForm.email.$error.email || ! reservation.courtId || ! reservation.startTime || ! reservation.duration || sending">
            Absenden
        </button>
    </p>

</form>