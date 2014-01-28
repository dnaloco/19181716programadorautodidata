AdminApp.directive('groupsList',
	['groupFactory',
	function (group) {
		return {
			templateUrl: '/frontend/partials/admin/directives/groups-list.html',
		}
	}]);