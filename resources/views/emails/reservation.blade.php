<h3>Eine neue Reservierungsanfrage ist eingegangen</h3>

<table width="100%">
    <tr>
        <td>Name:</td>
        <td>{{ $reservation->first_name }} {{ $reservation->last_name }}</td>
    </tr>
    <tr>
        <td>E-Mail</td>
        <td>{{ $reservation->email }}</td>
    </tr>
    <tr>
        <td>Telefon</td>
        <td>{{ $reservation->phone }}</td>
    </tr>
    <tr>
        <td>Platz:</td>
        <td>{{ $reservation->court->name }}</td>
    </tr>
    <tr>
        <td>Datum:</td>
        <td>{{ $reservation->date }}</td>
    </tr>
    <tr>
        <td>Startzeit:</td>
        <td>{{ format_time($reservation->start_time) }} Uhr</td>
    </tr>
    <tr>
        <td>Dauer:</td>
        <td>{{ $reservation->duration }} Stunde(n)</td>
    </tr>
    @if($reservation->recurring)
        <tr>
            <td>Dauerreservierung:</td>
            <td>
                {{--{{ $reservation->recurring_interval }}<br>--}}
                Alle {{ $reservation->recurring_interval_weeks }} Wochen <br>
                {{ $reservation->recurring_type }}
            </td>
        </tr>
    @endif
</table>

<p>
    -- <br/>
    <small>Diese E-Mail wurde automatisch generiert.</small>
</p>