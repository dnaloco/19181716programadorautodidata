AdminApp.factory('groupFactory',
	['$http',
	function ($http) {
		var url = '/rest/groups/';

		return {
			getAll: function () {
				return $http.get(url);
			},
			getId: function (id) {
				return $http.get(url + id);
			},
			add: function (group) {
				return $http.post(url, group);
			},
			save: function (id, group) {
				return $http.put(url + id, group);
			},
			delete: function (id) {
				return $http.delete(url + id);
			}
		};
	}]);