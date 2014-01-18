var BlogApp =  angular.module('BlogApp', ['ngRoute']);

BlogApp.config(['$interpolateProvider', '$locationProvider',
	function ($interpolateProvider, $locationProvider) {
		$interpolateProvider
		.startSymbol('[[')
		.endSymbol(']]');

		$locationProvider.html5Mode(true);
	}]);