AdminApp.factory('userFactory',
	['$http',
	function ($http) {
		var url = '/rest/users/';
		return {
			getAll: function () {
				return $http.get(url);
			},
			getId: function (id) {
				return $http.get(url + id);
			},
			add: function (user) {
				return $http.post(url, user);
			},
			save: function (id, user) {
				return $http.put(url + id, user);
			},
			delete: function (id) {
				return $http.delete(url + id);
			}
		};
	}]);