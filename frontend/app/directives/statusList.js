AdminApp.directive('statusList',
	['statusFactory',
	function (status) {
		return {
			templateUrl: '/frontend/partials/admin/directives/status-list.html',
			link: function (scope, element, attrs) {
				$(document).foundation();

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

					scope.edited.name = s.status;
					scope.edited.type = scope.types[select];

					angular.element('#editStatus').foundation('reveal', 'open');
				};

				scope.save = function (id, edited)  {
					var i, len;
					edited.type = edited.type.abr;

					status.save(id, edited).success(function(data) {
						for(i = 0, len = scope.status.length; i < len; i += 1) {
							if(scope.status[i].id === id) {
								scope.status[i] = data;
							}
						}
					});


					angular.element('#editStatus').foundation('reveal', 'close');
				};
			}
		};
	}]);