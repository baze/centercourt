'use strict';

var $ = require('jquery');
var moment = require('moment');
require('bootstrap-datepicker');
require('bootstrap-datepicker-locale-de');

module.exports = function ($scope, $controller, $window, $filter, $compile) {

    $.extend(this, $controller('AppController', {$scope: $scope}));

    // $scope.init = function() {
    //     $scope.initialize();
    // };

    $scope.drawReservation = function (reservation, myClass) {
        var rows = $('tr[data-time="' + reservation.startTime + '"]').nextUntil('tr[data-time="' + reservation.endTime + '"]').andSelf();

        var elems = rows.find('td[data-court-id="' + reservation.courtId + '"] span');

        elems.addClass(myClass);

        if ($scope.isAdmin && reservation.id) {
            elems.text(reservation.first_name);
        }

        if (reservation.id) {
            elems.attr('data-reservation', reservation.id);
            elems.attr('data-toggle', 'popover');
        }
    };

    $scope.drawHoliday = function (myClass) {
        var elems = $('.courts-table').find('td, th');

        elems.addClass(myClass);
    };

    $scope.getPopoverContent = function (reservation) {
        var content = "<dl>";
        content += "<dt>Name</dt><dd>" + reservation.first_name;

        if (reservation.last_name) {
            content += " " + reservation.last_name + "</dd>";
        }

        content += "<dt>Start</dt><dd>" + $filter('formatTime')(reservation.start_time) + "</dd>";
        content += "<dt>Dauer</dt><dd>" + $filter('formatHours')(reservation.duration) + "</dd>";

        if (reservation.email) {
            content += "<dt>E-Mail</dt><dd>" + reservation.email + "</dd>";
        }

        if (reservation.phone) {
            content += "<dt>Telefon</dt><dd>" + reservation.phone + "</dd>";
        }

        if (reservation.recurring == 1) {

            var recurringInterval = $filter('filter')($scope.recurringIntervals, {value: reservation.recurring_interval})[0];
            var recurringType = $filter('filter')($scope.recurringTypes, {value: reservation.recurring_type})[0];

            content += "<dt>Wiederholung</dt>";
            content += "<dd>";
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
        content += "<small>";
        content += "Erstellt am: " + moment(reservation.created_at).format('DD.MM.YYYY') + "<br>";
        content += "Erstellt von: " + reservation.user_id + "<br>";
        content += "ID: " + reservation.reservation_number;
        content += "</small>";

        content += "<hr>";

        content += '<button type="button" class="btn btn-danger btn-xs btn-block btn-lg" data-toggle="modal" data-target="#myModal">';
        content += 'Löschen';
        content += '</button>';

        return content;
    };

    $scope.highlightReservation = function($event) {
        var reservationId = $($event.target).attr('data-reservation');

        $('span[data-reservation]').removeAttr('data-highlight');

        if (reservationId) {

            $('span[data-reservation=' + reservationId + ']').attr('data-highlight', true);
        }
    };

    $scope.showReservationInfoPopover = function ($event, action) {

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

                $scope.reservationForDeletion = reservation;
                $scope.reservationDeleteAction = action + '/' + reservation.id;

                var content = $scope.getPopoverContent(reservation);

                var popover = $($event.target).attr('data-content', content.toString()).data('bs.popover');
                popover.setContent();
                popover.$tip.addClass(popover.options.placement);

            }

        }

    };

};