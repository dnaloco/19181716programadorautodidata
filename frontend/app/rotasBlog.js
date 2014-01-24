BlogApp.config(
	['$routeProvider',
	function ($routeProvider) {
		$routeProvider.
		when('/', {
			templateUrl: '/frontend/partials/blog/home.html',
			controller: 'BlogCtrl'
		})
		.when('/post/:postId', {
			templateUrl: '/frontend/partials//blogpost-view.html',
			controller: 'PostCtrl'
		})
		.otherwise({
			redirectTo: '/'
		});
	}]);