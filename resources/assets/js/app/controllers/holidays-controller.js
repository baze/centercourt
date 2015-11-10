'use strict';

var $ = require('jquery');
var moment = require('moment');
require('bootstrap');

module.exports = function($scope) {

    $scope.holidayStartDate = undefined;
    $scope.holidayEndDate = undefined;

    $scope.initialize = function () {

        $('.datetimepicker-startDate').datepicker({
            format: "mm.dd.yyy",
            startDate: "-0d",
            endDate: "+3y",
            todayBtn: true,
            clearBtn: false,
            language: "de",
            todayHighlight: true
        }).on('changeDate', function (e) {
            $('.datetimepicker-endDate').datepicker('setStartDate', e.date);

            $scope.$apply(function () {
                $scope.holidayStartDate = moment(e.date).format('YYYY-MM-DD');
            });
        });

        $('.datetimepicker-endDate').datepicker({
            format: "mm.dd.yyy",
            startDate: "+1d",
            endDate: "+3y",
            todayBtn: false,
            clearBtn: true,
            language: "de",
            todayHighlight: false
        }).on('changeDate', function (e) {
            $('.datetimepicker-startDate').datepicker('setEndDate', e.date);

            $scope.$apply(function () {
                $scope.holidayEndDate = moment(e.date).format('YYYY-MM-DD');
            });
        });
    };

    $scope.init = function () {
        $scope.initialize();
    };

};