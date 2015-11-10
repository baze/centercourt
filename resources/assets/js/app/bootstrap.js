'use strict';

module.exports = function(app) {
	// Controllers
	app.controller('AppController', require('./controllers/app-controller'));
	app.controller('HolidaysController', require('./controllers/holidays-controller'));
	app.controller('SliderController', require('./controllers/slider-controller'));
	app.controller('TableController', require('./controllers/table-controller'));
	// Directives
	app.directive('ngContextmenu', require('./directives/ng-contextmenu'));
	// Filters
	app.filter('formatHours', require('./filters/format-hours'));
	app.filter('formatTime', require('./filters/format-time'));
};