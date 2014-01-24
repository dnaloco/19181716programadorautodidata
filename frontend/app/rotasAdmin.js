AdminApp.config(
	['$routeProvider',
	function ($routeProvider) {
		$routeProvider
		.when('/admin', {
			templateUrl: '/frontend/partials/admin/home.html',
			controller: 'AdminCtrl'
		})
		.when('/admin/status', {
			templateUrl: '/frontend/partials/admin/status.html',
			controller: 'StatusCtrl'
		})
		.otherwise({
			redirectTo: '/admin'
		});
	}]);