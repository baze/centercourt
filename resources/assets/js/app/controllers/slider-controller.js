'use strict';

var $ = require('jquery');
var moment = require('moment');
require('flexslider');

module.exports = function ($scope, $controller, $filter) {

    $.extend(this, $controller('AppController', {$scope: $scope}));

    $scope.init = function () {
        $scope.initialize();

        $('.flexslider').flexslider({
            animation: "slide",
            slideshow: false,
            directionNav: true,
            start: function (slider) {
                $scope.$apply(function() {
                    $scope.reservation.courtId = slider.currentSlide + 1;
                    $scope.drawReservations();
                    $scope.drawTempReservation();
                });
            },
            before: function () {
                $scope.$apply(function () {
                    $scope.reservation.courtId = undefined;
                    $('.hasReservation').removeClass('hasReservation');
                    $scope.drawTempReservation();
                });
            },
            after: function (slider) {
                $scope.$apply(function () {
                    $scope.reservation.courtId = slider.currentSlide + 1;
                    $scope.drawReservations();
                    $scope.drawTempReservation();
                });
            }
        });
    };

    $scope.filterReservations = function (reservations, filter) {

        filter.court_id = $scope.reservation.courtId;

        return $filter('filter')(reservations, filter);
    };

    $scope.drawReservation = function (reservation, myClass) {

        var cells = $('.reservationWrapper[data-time="' + reservation.startTime + '"]').nextUntil('.reservationWrapper[data-time="' + reservation.endTime + '"]').andSelf();

        cells.find('span').addClass(myClass);
    };

};