AdminApp.directive('statusList',
	['statusFactory',
	function (status) {
		return {
			templateUrl: '/frontend/partials/admin/directives/status-list.html',
			link: function (scope, element, attrs) {
				angular.element(document).foundation();

				scope.edit = function (s) {
					var select;
					scope.edited = {};

					switch(s.type) {
						case 'p':
							select = 0;
							break;
						case 'u':
							select = 1;
							break;
						case 'b':
							select = 2;
							break;
					}

					scope.id = s.id;

					scope.edited.status = s.status;
					scope.edited.type = scope.types[select];

					angular.element('#editStatus').foundation('reveal', 'open');
				};

				scope.save = function (id, edited)  {
					edited.type = edited.type.abr;
					console.log(edited);
					status.save(id, edited).success(function(data) {
						console.log(data);
						if (data.error) {
							console.log(data.error);
						} else {
							scope.updateList();
						}
					}).error(function (data) {
						console.log(data);
					})

					angular.element('#editStatus').foundation('reveal', 'close');
				};

				scope.delete = function (id) {
					console.log(id);
					scope.id = id;
					angular.element('#deleteStatus').foundation('reveal', 'open');
				}

				scope.excluir = function (id) {
					status.delete(id).success(function (data) {
						if (data.error) {
							console.log(data.error);
						} else {
							scope.updateList();
						}
						angular.element('#deleteStatus').foundation('reveal', 'close');	
					})
				}

				scope.cancelar = function () {
					angular.element('#deleteStatus').foundation('reveal', 'close');
					angular.element('#editStatus').foundation('reveal', 'close');	
				}
			}
		};
	}]);