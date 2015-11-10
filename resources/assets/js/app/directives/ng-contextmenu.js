'use strict';

var $ = require('jquery');
require('bootstrap');

module.exports = function ($parse) {

    return function (scope, element, attrs) {
        var fn = $parse(attrs.ngRightClick);
        element.on('contextmenu', function (event) {
            event.preventDefault();

            var contextMenuIdentifier = attrs.ngContextmenu;
            var contextMenu = $('.contextmenu[data-contextmenu="'+contextMenuIdentifier+'"]');
            contextMenu.css({
                'display' : 'block'
            });

            scope.$apply(function () {
                fn(scope, {$event: event});
            });
        });
    };

};