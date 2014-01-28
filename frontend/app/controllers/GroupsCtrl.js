AdminApp.controller('GroupsCtrl',
	['$scope', 'groupFactory', 'permissionFactory',
	function ($scope, group, permission) {
		group.getAll().success(function (data) {
			$scope.groups = data;
		});

		permission.getAll().success(function (data) {
			$scope.permissions = data;
		})
	}]);