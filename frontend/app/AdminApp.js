var AdminApp =  angular.module('AdminApp', ['ngRoute']);

AdminApp.config(['$interpolateProvider', '$locationProvider',
	function ($interpolateProvider, $locationProvider) {
		$interpolateProvider
		.startSymbol('[[')
		.endSymbol(']]');

		$locationProvider.html5Mode(true);
	}]);