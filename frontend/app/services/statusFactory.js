AdminApp.factory('statusFactory',
	['$http',
	function ($http) {
		var url = '/rest/status/';

		return {
			getAll: function () {
				return $http.get(url);
			},
			add: function (status) {
				return $http.post(url, {'status': status});
			},
			save: function (id, status) {
				return $http.put(url + id, {'status': status});
			},
			delete: function (id){
				return $http.delete(url + id);
			}
		}
	}]);