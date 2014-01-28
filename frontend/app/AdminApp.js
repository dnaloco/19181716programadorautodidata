var AdminApp =  angular.module('AdminApp', ['ngRoute']);

AdminApp.config(['$interpolateProvider', '$locationProvider', '$httpProvider',
	function ($interpolateProvider, $locationProvider, $httpProvider) {
		if (!$httpProvider.defaults.headers.get) {
			$httpProvider.defaults.headers.get = {};
		}

		$httpProvider.defaults.headers.get['If-Modified-Since'] = '0';

		$interpolateProvider
		.startSymbol('[[')
		.endSymbol(']]');

		$locationProvider.html5Mode(true);
	}]);