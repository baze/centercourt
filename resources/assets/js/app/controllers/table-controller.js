'use strict';

var $ = require('jquery');
var moment = require('moment');
require('bootstrap-datepicker');

module.exports = function ($scope, $controller, $window, $filter) {

    $.extend(this, $controller('AppController', {$scope: $scope}));

    $scope.init = function() {
        $scope.initialize();
    };

    $scope.drawReservation = function (reservation, myClass) {
        var rows = $('tr[data-time="' + reservation.startTime + '"]').nextUntil('tr[data-time="' + reservation.endTime + '"]').andSelf();

        var elems = rows.find('td[data-court-id="' + reservation.courtId + '"] span');

        elems.addClass(myClass);

        if (reservation.id) {
            elems.attr('data-reservation', reservation.id);
            elems.attr('data-toggle', 'popover');
        }
    };

    $scope.drawHoliday = function (myClass) {
        var elems = $('.courts-table').find('td, th');

        elems.addClass(myClass);
    };

    $scope.getPopoverContent = function (reservation, action, csrf_token) {
        var content = "<dl>";
        content += "<dt>Name</dt><dd>" + reservation.first_name;

        if (reservation.last_name) {
            content += " " + reservation.last_name + "</dd>";
        }

        content += "<dt>Start</dt><dd>" + $filter('formatTime')(reservation.start_time) + "</dd>";
        content += "<dt>Dauer</dt><dd>" + $filter('formatHours')(reservation.duration) + "</dd>";
        //content += "<dt>E-Mail</dt><dd>" + reservation.email + "</dd>";
        //content += "<dt>Telefon</dt><dd>" + reservation.phone + "</dd>";

        if (reservation.recurring == 1) {

            var recurringInterval = $filter('filter')($scope.recurringIntervals, {value: reservation.recurring_interval})[0];
            var recurringType = $filter('filter')($scope.recurringTypes, {value: reservation.recurring_type})[0];

            content += "<dt>Wiederholung</dt><dd>";
            content += recurringInterval.label;

            if (recurringInterval.value == 'weekly') {
                var interval = reservation.recurring_interval_weeks ? reservation.recurring_interval_weeks : 1;
                content += ' <small>(' + $filter('filter')($scope.recurringIntervalsWeeks, {value: interval})[0].label + ')</small>';
            }

            content += '<p class="recurringType-' + recurringType.value + '"><strong>' + recurringType.label + '</strong></p>';

            content += "</dd>";
        }

        content += "</dl>";
        content += "<hr>";
        content += "<small>Erstellt am: " + moment(reservation.created_at).format('DD.MM.YYYY') + "<br>" +
            "ID: " + reservation.reservation_number +
            "</small>";

        content += "<hr>";

        action = action + "/" + reservation.id;

        content += "<form action='" + action + "' method='POST'>";
        content += '<input name="_method" type="hidden" value="DELETE">';
        content += '<input type="hidden" name="_token" value="'+ csrf_token + '">';
        content += "<input type='submit' value='Löschen' class='btn btn-danger btn-xs btn-block'>";
        content += "</form>";

        return content;
    };

    $scope.showReservationInfoPopover = function ($event, action, csrf_token) {

        if (!$scope.mouseIsCurrentlyClicked) {

            $('.popover').popover('hide');

            var reservationId = $($event.target).attr('data-reservation');

            $('span[data-reservation]').removeAttr('data-highlight');

            if (reservationId) {

                $('span[data-reservation=' + reservationId + ']').attr('data-highlight', true);

                var filter = {
                    date: moment($scope.reservation.date).format('YYYY-MM-DD'),
                    id: reservationId
                };

                var reservation = $scope.filterReservations($window.myApp.reservations, filter)[0];

                var content = $scope.getPopoverContent(reservation, action, csrf_token);

                var popover = $($event.target).attr('data-content', content).data('bs.popover');
                popover.setContent();
                popover.$tip.addClass(popover.options.placement);

            }

        }

    };

};