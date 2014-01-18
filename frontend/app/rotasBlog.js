BlogApp.config(
	['$routeProvider',
	function ($routeProvider) {
		$routeProvider.
		when('/', {
			templateUrl: '/frontend/partials/home.html',
			controller: 'BlogCtrl'
		});
	}]);