'use strict';

module.exports = function ($filter) {
    return function (time) {

        var hourSuffix = ' Stunden';

        if (typeof time !== 'undefined') {

            if (time == 1) {
                hourSuffix = ' Stunde';
            }

            time = parseFloat($filter('number')(time, 1));

            return time + hourSuffix;
        }

    }
};