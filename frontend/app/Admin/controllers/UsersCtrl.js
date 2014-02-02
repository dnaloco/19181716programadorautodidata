AdminApp.controller('UsersCtrl',
	['$scope', 'userFactory', 'statusFactory', 'groupFactory',
	function ($scope, user, status, group) {
		status.getAll().success(function (data) {
			$scope.status = data;
			$scope.test = function () {
				console.log($scope.selectedStatus);
			}

			group.getAll().success(function (data) {
				console.log('Grupos: ', data);
				$scope.groups = data;
			});

			status.getAll().success(function (data) {
				console.log('Status: ', data);
				$scope.status = data;
			})
		})
	}]);