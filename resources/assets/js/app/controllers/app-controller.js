'use strict';

var $ = require('jquery');
var moment = require('moment');
require('bootstrap');

module.exports = function($scope, $window, $filter, $http) {

    $scope.conflicts = {
        CONFLICT_RESERVATION_IN_PAST: 'Ihr Reservierungswunsch liegt in der Vergangenheit.',
        CONFLICT_RESERVATION_IN_FUTURE: 'Ihr Reservierungswunsch liegt zu weit in der Zukunft. Bitte wählen Sie ein Datum innerhalb des kommenden Monats.',
        CONFLICT_EXISTING_RESERVATION: 'Ihr Reservierungswunsch kollidiert mit einer bereits vorhandenen Reservierung.',
        CONFLICT_INVALID_DURATION: 'Bitte reduzieren Sie die Spieldauer oder wählen Sie einen früheren Spielbeginn.'
    };

    $scope.mouseIsCurrentlyClicked = false;

    $scope.reservation = {
        date: new Date,
        endDate: undefined,
        courtId: undefined,
        startTime: undefined,
        endTime: undefined,
        duration: undefined,
        recurring: false,
        recurringInterval: undefined,
        recurringType: undefined,
        first_name: undefined,
        last_name: undefined,
        email: undefined,
        phone: undefined
    };

    $scope.reservation.email = $window.myApp.email;
    $scope.holidays = $window.myApp.holidays;

    $scope.conflict = false;
    $scope.sending = false;
    $scope.successMessage = '';
    $scope.errorMessage = '';

    $scope.firstSelectedTime = undefined;

    var RECURRING_INTERVAL_DAILY = 'daily';
    var RECURRING_INTERVAL_WEEKLY = 'weekly';
    var RECURRING_INTERVAL_MONTHLY = 'monthly';

    $scope.recurringIntervals = [
        //{value: RECURRING_INTERVAL_DAILY, label: 'täglich'},
        {value: RECURRING_INTERVAL_WEEKLY, label: 'wöchentlich'},
        {value: RECURRING_INTERVAL_MONTHLY, label: 'monatlich'}
    ];

    $scope.recurringIntervalsWeeks = [
        {value: 1, label: 'jede Woche'},
        {value: 2, label: '14-tägig'},
        {value: 3, label: 'alle 3 Wochen'},
        {value: 4, label: 'alle 4 Wochen'}
    ];

    $scope.recurringTypes = [
        {value: 'privat', label: 'Privat'},
        {value: 'verein', label: 'Verein'},
        {value: 'dutzendkarte', label: 'Dutzendkarte'}
    ];

    $scope.startTimes = [
        {value: 8, label: "8:00"},
        {value: 8.5, label: "8:30"},
        {value: 9, label: "9:00"},
        {value: 9.5, label: "9:30"},
        {value: 10, label: "10:00"},
        {value: 10.5, label: "10:30"},
        {value: 11, label: "11:00"},
        {value: 11.5, label: "11:30"},
        {value: 12, label: "12:00"},
        {value: 12.5, label: "12:30"},
        {value: 13, label: "13:00"},
        {value: 13.5, label: "13:30"},
        {value: 14, label: "14:00"},
        {value: 14.5, label: "14:30"},
        {value: 15, label: "15:00"},
        {value: 15.5, label: "15:30"},
        {value: 16, label: "16:00"},
        {value: 16.5, label: "16:30"},
        {value: 17, label: "17:00"},
        {value: 17.5, label: "17:30"},
        {value: 18, label: "18:00"},
        {value: 18.5, label: "18:30"},
        {value: 19, label: "19:00"},
        {value: 19.5, label: "19:30"},
        {value: 20, label: "20:00"},
        {value: 20.5, label: "20:30"},
        {value: 21, label: "21:00"},
        {value: 21.5, label: "21:30"},
        {value: 22, label: "22:00"}
    ];

    $scope.durations = [
        0.5,
        1, 1.5,
        2, 2.5,
        3, 3.5,
        4, 4.5,
        5, 5.5,
        6, 6.5,
        7, 7.5,
        8, 8.5,
        9, 9.5,
        10, 10.5,
        11, 11.5,
        12, 12.5,
        13, 13.5,
        14, 14.5,
        15
    ];

    $scope.setDummyData = function() {
        $scope.reservation.startTime = 14;
        $scope.reservation.duration = 1;
        $scope.reservation.courtId = 2;
        //$scope.reservation.recurring = true;

        $scope.reservation.first_name = "Sabine";
        $scope.reservation.last_name = "Sonnenschein";
        $scope.reservation.email = "hullu@euw.de";
        $scope.reservation.phone = "124567";
    };

    $scope.initialize = function () {
        //$scope.setDummyData();

        $('.datetimepicker-startDate').datepicker({
            format: "mm.dd.yyy",
            startDate: "-0d",
            endDate: "+1y",
            todayBtn: true,
            clearBtn: false,
            language: "de",
            todayHighlight: true
        }).on('changeDate', function (e) {

            $scope.$apply(function () {
                $scope.reservation.date = e.date;
            });

            $('.datetimepicker-endDate').datepicker('setStartDate', e.date);

        });

        $('.datetimepicker-endDate').datepicker({
            format: "mm.dd.yyy",
            startDate: "+1d",
            endDate: "+1y",
            todayBtn: false,
            clearBtn: true,
            language: "de",
            todayHighlight: false
        }).on('changeDate', function (e) {

            $scope.$apply(function () {
                $scope.reservation.endDate = e.date;
            });

            $('.datetimepicker-startDate').datepicker('setEndDate', e.date);

        }).on('clearDate', function (e) {

            $scope.$apply(function () {
                $scope.reservation.endDate = e.date;
            });

            $('.datetimepicker-startDate').datepicker('setEndDate', '+1y');

        });
    };

    $scope.init = function () {

        $scope.initialize();
    };

    $scope.selectStartTime = function (courtId, startTime) {
        $scope.mouseIsCurrentlyClicked = true;

        $scope.reservation.courtId = courtId;

        $scope.firstSelectedTime = startTime;
        $scope.reservation.startTime = startTime;
        $scope.reservation.duration = 0.5;
    };

    $scope.touchStart = function() {
        alert("start");
    };

    $scope.touchEnd = function () {
        alert("end");
    };

    $scope.endSelection = function () {

        $scope.mouseIsCurrentlyClicked = false;
    };

    $scope.selectEndTime = function(courtId, time) {

        if ($scope.mouseIsCurrentlyClicked) {

            if (courtId != $scope.reservation.courtId) {
                $scope.reservation.courtId = courtId;
            }

            var endTime = undefined;

            if (time < $scope.firstSelectedTime) {
                $scope.reservation.startTime = time;
                endTime = $scope.firstSelectedTime;
            } else {
                $scope.reservation.startTime = $scope.firstSelectedTime;
                endTime = time;
            }

            endTime += 0.5;

            $scope.reservation.duration = endTime - $scope.reservation.startTime;
        }
    };

    $scope.$watch('reservation.date', function () {
        $('[data-toggle="popover"]').popover('destroy');

        $scope.drawHolidays();
        $scope.drawReservations();
        $scope.drawTempReservation();
    });

    $scope.$watch('reservation.startTime', function () {
        $scope.drawTempReservation();
    });

    $scope.$watch('reservation.duration', function () {
        $scope.drawTempReservation();
    });

    $scope.$watch('reservation.recurring', function (newValue) {
        if (newValue) {
            $scope.reservation.recurringType = $scope.recurringTypes[0].value;
            $scope.reservation.recurringInterval = $scope.recurringIntervals[0].value;
            $scope.reservation.recurring_interval_weeks = $scope.recurringIntervalsWeeks[0].value;
        } else {
            $scope.reservation.recurringType = undefined;
            $scope.reservation.recurringInterval = undefined;
            $scope.reservation.recurring_interval_weeks = undefined;
        }

        $scope.drawTempReservation();
    });

    $scope.$watch('reservation.recurring_interval_weeks', function () {
        $scope.drawTempReservation();
    });

    $scope.$watch('conflict', function () {

        if ($scope.conflict) {
            $scope.errorMessage = $scope.conflicts[$scope.conflict];
        } else {
            $scope.errorMessage = '';
        }
    });

    $scope.$watch('reservation.courtId', function () {
        $scope.drawTempReservation();
    });

    $scope.drawReservation = function (startTime, endTime, courtId, myClass) {
        // override in extended, specific controller
    };

    $scope.drawHoliday = function (myClass) {
        // override in extended, specific controller
    };

    $scope.filterReservations = function(reservations, filter) {

        return $filter('filter')(reservations, filter);
    };

    $scope.drawHolidays = function() {
        var holidays = $scope.holidays;
        var dateString = moment($scope.reservation.date).format('YYYY-MM-DD');

        $('.holidays')
            .removeClass('holidays');

        var holidaysFound = $filter('filter')(holidays, {
            start_date: dateString
        });

        if (holidaysFound.length) {
            $scope.drawHoliday('holidays');
        }
    };

    $scope.drawReservations = function () {

        $('.hasReservation')
            .removeClass('hasReservation')
            .removeClass('recurringReservation')
            .removeClass('recurringReservation-privat')
            .removeClass('recurringReservation-verein')
            .removeClass('recurringReservation-dutzendkarte')
            .removeAttr('data-reservation')
            .removeAttr('data-toggle');

        if (typeof $scope.reservation.date !== 'undefined') {

            var dateString = moment($scope.reservation.date).format('YYYY-MM-DD');

            var filter = {
                date: dateString,
                recurring: 0
            };

            var reservations = $scope.filterReservations($window.myApp.reservations, filter);

            $scope.drawReservationsWithClass(reservations, 'hasReservation');

            filter = {
                date: dateString,
                recurring: 1
            };

            reservations = $scope.filterReservations($window.myApp.reservations, filter);

            $scope.drawReservationsWithClass(reservations, 'hasReservation recurringReservation');
        }

        $('[data-toggle="popover"]').popover();

    };

    $scope.drawReservationsWithClass = function(reservations, myClass) {

        for (var i = 0; i < reservations.length; i++) {

            var r = reservations[i];

            var startTime = parseFloat(r.start_time);
            var duration = parseFloat(r.duration);
            var endTime = startTime + duration;
            var courtId = r.court_id;
            var reservationId = r.id;

            var reservation = {
                startTime: startTime,
                endTime: endTime,
                courtId: courtId,
                id: reservationId
            };

            var myClassFinal = myClass;

            if (r.recurring) {
                myClassFinal += ' recurringReservation-' + r.recurring_type;
            }

            $scope.drawReservation(reservation, myClassFinal);
        }
    };

    $scope.checkForConflictWithReservation = function(reservation) {
        if (!$scope.conflict) {
            var startTime = parseFloat(reservation.start_time);
            var duration = parseFloat(reservation.duration);

            var endTime = startTime + duration;

            if (($scope.reservation.startTime < startTime && ($scope.reservation.startTime + $scope.reservation.duration) > startTime)
                || ($scope.reservation.startTime >= startTime && ($scope.reservation.startTime + $scope.reservation.duration) <= endTime)
                || ($scope.reservation.startTime < endTime && ($scope.reservation.startTime + $scope.reservation.duration) > startTime)) {

                $scope.conflict = 'CONFLICT_EXISTING_RESERVATION';
            }
        }
    };

    $scope.checkForConflictWithExistingReservationsForCurrentDay = function() {
        var startDate = moment($scope.reservation.date);
        var dateString = startDate.format('YYYY-MM-DD');

        var filter = {
            date: dateString,
            court_id: $scope.reservation.courtId
        };

        var reservations = $scope.filterReservations($window.myApp.reservations, filter);

        for (var i = 0; i < reservations.length; i++) {
            $scope.checkForConflictWithReservation(reservations[i]);
        }
    };

    $scope.checkForConflictWithRecurringReservations = function() {

        if ($scope.reservation.recurring) {

            var reservations = [];
            var filter = {
                court_id: $scope.reservation.courtId
            };

            var allReservations = undefined;
            var date = undefined;
            var startDate = undefined;

            switch ($scope.reservation.recurringInterval) {
                case RECURRING_INTERVAL_DAILY:

                    reservations = $scope.filterReservations($window.myApp.reservations, filter);

                    break;
                case RECURRING_INTERVAL_WEEKLY:

                    allReservations = $scope.filterReservations($window.myApp.reservations, filter);

                    for (var n = 0; n < allReservations.length; n++) {

                        startDate = moment($scope.reservation.date);

                        for (var j = 0; j < 52 / $scope.reservation.recurring_interval_weeks; j++) {

                            date = startDate.add($scope.reservation.recurring_interval_weeks, 'weeks').format('YYYY-MM-DD');

                            filter = {
                                date: date,
                                court_id: $scope.reservation.courtId
                            };

                            reservations = reservations.concat($scope.filterReservations($window.myApp.reservations, filter));
                        }

                        startDate = moment($scope.reservation.date);

                        for (var j = 52 / $scope.reservation.recurring_interval_weeks; j > 0; j--) {

                            date = startDate.subtract($scope.reservation.recurring_interval_weeks, 'weeks').format('YYYY-MM-DD');

                            filter = {
                                date: date,
                                court_id: $scope.reservation.courtId
                            };

                            reservations = reservations.concat($scope.filterReservations($window.myApp.reservations, filter));
                        }
                    }

                    break;
                case RECURRING_INTERVAL_MONTHLY:
                    allReservations = $scope.filterReservations($window.myApp.reservations, filter);

                    for (var n = 0; n < allReservations.length; n++) {

                        startDate = moment($scope.reservation.date);

                        for (var j = 0; j < 12; j++) {

                            date = startDate.add(1, 'months').format('YYYY-MM-DD');

                            filter = {
                                date: date,
                                court_id: $scope.reservation.courtId
                            };

                            reservations = reservations.concat($scope.filterReservations($window.myApp.reservations, filter));
                        }
                    }

                    break;
                default:

                    break;
            }

            for (var i = 0; i < reservations.length; i++) {
                $scope.checkForConflictWithReservation(reservations[i]);
            }
        }

    };

    $scope.detectConflicts = function() {

        $scope.conflict = undefined;

        var minDate = $window.myApp.minDate;
        var maxDate = $window.myApp.maxDate;
        var now = moment();

        if ($scope.reservation.startTime + $scope.reservation.duration > $window.myApp.maxTime) {
            $scope.conflict = 'CONFLICT_INVALID_DURATION';
        } else if (moment($scope.reservation.date).format('YYYY-MM-DD') < moment(minDate).format('YYYY-MM-DD')) {
            $scope.conflict = 'CONFLICT_RESERVATION_IN_PAST';
        } else if (moment($scope.reservation.date).format('YYYY-MM-DD') > moment(maxDate).format('YYYY-MM-DD')) {
            $scope.conflict = 'CONFLICT_RESERVATION_IN_FUTURE';
        } else if (moment($scope.reservation.date).format('YYYY-MM-DD') == now.format('YYYY-MM-DD') && Math.floor($scope.reservation.startTime) <= now.format('H')) {
            $scope.conflict = 'CONFLICT_RESERVATION_IN_PAST';
        }

        if (! $scope.conflict) {

            $scope.checkForConflictWithExistingReservationsForCurrentDay();
            $scope.checkForConflictWithRecurringReservations();
        }

    };

    $scope.drawTempReservation = function () {

        $scope.detectConflicts();

        var myClass = 'tempReservation';

        $('.tempReservation')
            .removeClass(myClass)
            .removeClass('reservationIsInvalid')
            .removeClass('recurringTempReservation')
            .removeClass('recurringTempReservation-privat')
            .removeClass('recurringTempReservation-verein')
            .removeClass('recurringTempReservation-dutzendkarte');

        if ($scope.conflict) {
            myClass += ' reservationIsInvalid';
        }

        if ($scope.reservation.recurring) {
            myClass += ' recurringTempReservation recurringTempReservation-' + $scope.reservation.recurringType;
        }

        if ($scope.reservation.startTime && $scope.reservation.duration && $scope.reservation.courtId) {

            $scope.reservation.endTime = $scope.reservation.startTime + $scope.reservation.duration;

            $scope.drawReservation($scope.reservation, myClass);
        }
    };

    $scope.storeReservation = function() {

        $scope.successMessage = '';
        $scope.errorMessage = '';

        var reservation = {
            date: moment($scope.reservation.date).format('YYYY-MM-DD'),
            court_id: $scope.reservation.courtId,
            start_time: $scope.reservation.startTime,
            duration: $scope.reservation.duration,
            first_name: $scope.reservation.first_name,
            last_name: $scope.reservation.last_name,
            email: $scope.reservation.email,
            phone: $scope.reservation.phone,
            recurring: +$scope.reservation.recurring
        };

        if ($scope.reservation.recurring) {
            reservation.recurring_interval = $scope.reservation.recurringInterval;
            reservation.recurring_type = $scope.reservation.recurringType;

            if ($scope.reservation.endDate) {
                reservation.end_date = moment($scope.reservation.endDate).format('YYYY-MM-DD');
            }

            if ($scope.reservation.recurringInterval == 'weekly') {
                reservation.recurring_interval_weeks = $scope.reservation.recurring_interval_weeks;
            }
        }

        $scope.sending = true;

        $http.post('api/v1/reservations', reservation).
            success(function (data) {
                // this callback will be called asynchronously
                // when the response is available

                //console.log("success");
                //console.log(data);

                $scope.sending = false;

                if (data instanceof Array) {
                    $window.myApp.reservations = $window.myApp.reservations.concat(data);
                } else {
                    $window.myApp.reservations.push(data);
                }

                $scope.reservation.startTime = undefined;
                $scope.reservation.duration = undefined;

                $scope.drawReservations();
                $scope.drawTempReservation();

                $scope.successMessage = 'Ihre Reservierungsanfrage wurde eingetragen.';

            }).
            error(function (data) {
                // called asynchronously if an error occurs
                // or server returns response with an error status.

                console.log("error");
                console.log(data);

                $scope.errorMessage = 'Fehler bei der Verarbeitung des Reservierungswunsches.';

                $scope.sending = false;
            });

    };

};