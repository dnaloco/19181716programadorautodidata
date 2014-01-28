AdminApp.directive('usersList',
	['userFactory',
	function (user) {
		return {
			templateUrl: '/frontend/partials/admin/directives/users-list.html',
		};
	}]);