AdminApp.controller('GroupsCtrl',
	['$scope', 'groupFactory', 'permissionFactory',
	function ($scope, group, permission) {
		$scope.updateGroups = function () {
			group.getAll().success(function (data) {
				$scope.groups = data;
			});
		};

		$scope.updatePermissions = function () {
			permission.getAll().success(function (data) {
				$scope.permissions = data;
			});	
		};

		$scope.newGroup = function () {
			group.add({'name': $scope.new.group}).success(function (data) {
				$scope.updateGroups();
				$scope.new.group = "";
			});
		};

		$scope.deleteGroup = function (id) {
			group.delete(id).success(function (data) {
				$scope.updateGroups();
			})
		};

		$scope.newPermission = function () {
			permission.add({'permission': $scope.new.permission}).success(function (data) {
				$scope.updatePermissions();
				$scope.new.permission = "";
			});
		};

		$scope.deletePermission = function (id) {
			permission.delete(id).success(function (data) {
				$scope.updatePermissions();
			})
		};

		$scope.updateGroups();
		$scope.updatePermissions();
	}]);