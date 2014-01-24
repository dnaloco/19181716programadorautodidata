AdminApp.controller('StatusCtrl',
	['$scope', 'statusFactory',
	function ($scope, status) {
		var statusObj = {};

		$scope.showEditMode = false;

		$scope.types =[
			{name: 'Post Status', abr: 'p'},
			{name: 'User Status', abr: 'u'},
			{name: 'Both Status', abr: 'b'},
		];
		
		status.getAll().success(function (data) {
			statusObj = data;
			$scope.status = statusObj;
		});

		$scope.newStatus = function () {
			status.add($scope.new.status).success(function (data) {
				statusObj.push(data);
			});
		};

		$scope.hideEditMode = function () {
			$scope.showEditMode = false;
		}

		$scope.toggleEditMode = function (e) {
			e.stopPropagation();
			$scope.showEditMode = !$scope.showEditMode;
		}
	}]);	