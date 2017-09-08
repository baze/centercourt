@extends('app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-10 col-md-offset-1">
                <div class="panel panel-default">

                    <div class="panel-body">

                        <h1>Preise</h1>

{{--                        @if($prices->count())

                        @else
                            <span class="help-block">Keine Preise eingetragen.</span>
                        @endif--}}

                        <div class="table-responsive">

                            <table class="table" style="width: 100%;">
                                <thead>
                                <tr>
                                    <th></th>
                                    <th colspan="2" style="text-align: center;">Hallenplätze 1 – 3</th>
                                    <th colspan="2" style="text-align: center;">Halle 2 – Platz 4</th>
                                </tr>
                                <tr>
                                    <th></th>
                                    <th style="text-align: center;">Abo</th>
                                    <th style="text-align: center;">Einzelstunde
                                        <small>(werktags)</small>
                                    </th>
                                    <th style="text-align: center;">Abo</th>
                                    <th style="text-align: center;">Einzelstunde
                                        <small>(werktags)</small>
                                    </th>
                                </tr>
                                </thead>
                                <tbody>
                                <tr>
                                    <td width="100">8 - 9 Uhr</td>
                                    <td align="right" width="80">11,00 €</td>
                                    <td align="right" width="80">12,00 €</td>
                                    <td align="right" width="80">8,00 €</td>
                                    <td align="right" width="80">9,00 €</td>
                                </tr>
                                <tr>
                                    <td width="100">9 - 14 Uhr</td>
                                    <td align="right" width="80">14,00 €</td>
                                    <td align="right" width="80">15,00 €</td>
                                    <td align="right" width="80">11,00 €</td>
                                    <td align="right" width="80">12,00 €</td>
                                </tr>
                                <tr>
                                    <td width="100">14 - 17 Uhr</td>
                                    <td align="right" width="80">17,00 €</td>
                                    <td align="right" width="80">18,00 €</td>
                                    <td align="right" width="80">14,00 €</td>
                                    <td align="right" width="80">15,00 €</td>
                                </tr>
                                <tr>
                                    <td width="100">17 - 23 Uhr</td>
                                    <td align="right" width="80">18,00 €</td>
                                    <td align="right" width="80">20,00 €</td>
                                    <td align="right" width="80">15,00 €</td>
                                    <td align="right" width="80">16,00 €</td>
                                </tr>
                                </tbody>
                            </table>
                            <h4>Dutzendkarte:</h4>
                            <table class="table" style="width: 100%;">
                                <thead>
                                <tr>
                                    <th></th>
                                    <th>Hallenplätze 1 – 3</th>
                                    <th style="text-align: right;">Platz 4</th>
                                </tr>
                                </thead>
                                <tbody>
                                <tr>
                                    <td>Montag bis Freitag</td>
                                    <td>
                                </tr>
                                <tr>
                                    <td>8.00 bis 14.00 Uhr</td>
                                    <td>150,00 €</td>
                                    <td align="right">130 €</td>
                                </tr>
                                <tr>
                                    <td>14.00 bis 23.00 Uhr</td>
                                    <td>195,00 €</td>
                                    <td align="right">175 €</td>
                                </tr>
                                </tbody>
                            </table>
                            <h4>Schüler &amp; Studenten sowie sonn- &amp; feiertags</h4>
                            <table class="table" style="width: 100%;">
                                <tbody>
                                <tr>
                                    <td>Einzelkarte</td>
                                    <td align="right">12,00 €</td>
                                </tr>
                                <tr>
                                    <td>Dutzendkarte</td>
                                    <td align="right">125,00 €</td>
                                </tr>
                                </tbody>
                            </table>

                        </div>

                        <div>
                            <small>
                                Hallentennisschuhe mit glatten Sohlen sind wegen des hochwertigen Schöpp Allround-Bodens
                                erforderlich.<br>
                                Platzbeleuchtung nach Bedarf - 0,50 bis 1,50 €<br>
                                Alle Preise (incl. 19 % MwSt. ) pro Platz und Stunde (gültig ab 1. Oktober 2016)<br>
                                Trainerstunden nach Bedarf
                            </small>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
