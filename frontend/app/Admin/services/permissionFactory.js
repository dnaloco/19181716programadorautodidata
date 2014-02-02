AdminApp.factory('permissionFactory',
	['$http',
	function ($http) {
		var url = '/rest/permissions/';

		return {
			getAll: function () {
				return $http.get(url);
			},
			getId: function (id) {
				return $http.get(url + id);
			},
			add: function (permission) {
				return $http.post(url, permission);
			},
			save: function (id, permission) {
				return $http.put(url + id, permission);
			},
			delete: function (id) {
				return $http.delete(url + id);
			}
		};
	}]);