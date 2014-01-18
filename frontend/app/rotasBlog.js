BlogApp.config(
	['$routeProvider',
	function ($routeProvider) {
		$routeProvider.
		when('/', {
			templateUrl: '/frontend/partials/home.html',
			controller: 'BlogCtrl'
		})
		.when('/post/:postId', {
			templateUrl: '/frontend/partials/post-novo.html',
			controller: 'BlogCtrl'
		})
		.otherwise({
			redirectTo: '/'
		});
	}]);