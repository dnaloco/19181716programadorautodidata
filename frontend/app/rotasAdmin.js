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
		.when('/admin/groups', {
			templateUrl: '/frontend/partials/admin/groups.html',
			controller: 'GroupsCtrl'
		})
		.when('/admin/users', {
			templateUrl: '/frontend/partials/admin/users.html',
			controller: 'UsersCtrl'
		})
		.otherwise({
			redirectTo: '/admin'
		});
	}]);