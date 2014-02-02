AdminApp.controller('StatusCtrl',
	['$scope', 'statusFactory',
	function ($scope, status) {
		var statusObj = {};

		$scope.types =[
			{name: 'Post Status', abr: 'p'},
			{name: 'User Status', abr: 'u'},
			{name: 'Both Status', abr: 'b'},
		];

		$scope.newStatus = function () {
			status.add($scope.new.status).success(function (data) {
				if (data.error) {
					if (data.error.search('Duplicate entry') > 0) {
						console.log('Duplicate entry');
					}
				} else {
					$scope.updateList();
				}
			});
		};

		$scope.updateList = function () {
			status.getAll().success(function (data) {
				$scope.status = data;
			});
		};

		$scope.updateList();

	}]);	