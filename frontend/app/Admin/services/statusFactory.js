AdminApp.factory('statusFactory',
	['$http',
	function ($http) {
		var url = '/rest/status/';

		return {
			getAll: function () {
				return $http.get(url, {cache: false});
			},
			getId: function (id) {
				return $http.get(url + id, {cache: false});	
			},
			add: function (status) {
				return $http.post(url, status);
			},
			save: function (id, status) {
				return $http.put(url + id, status);
			},
			delete: function (id){
				return $http.delete(url + id);
			}
		}
	}]);