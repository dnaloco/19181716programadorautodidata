BlogApp.config(
	['$routeProvider',
	function ($routeProvider) {
		$routeProvider.
		when('/', {
			templateUrl: '/frontend/partials/home.html',
			controller: 'BlogCtrl'
		})
		.when('/post/:postId', {
			templateUrl: '/frontend/partials/post-view.html',
			controller: 'PostCtrl'
		})
		.when('/post-form/:postId', {
			templateUrl: '/frontend/partials/post-form.html',
			controller: 'PostCtrl'
		})
		.otherwise({
			redirectTo: '/'
		});
	}]);