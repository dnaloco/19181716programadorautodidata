AdminApp.directive('groupsList',
	['groupFactory', 'permissionFactory',
	function (group, permission) {
		return {
			templateUrl: '/frontend/partials/admin/directives/groups-list.html',
			link: function (iScope, iElement, iAttr) {
				angular.element(document).foundation();
				function inPermissions (permission) {
					for(i = 0, l = iScope.permissions.length; i < l; i += 1) {
						if (iScope.permissions[i].id === permission.id) {
							iScope.permissions[i].checked = true;
						}
					}
				}

				iScope.viewPermissions = function (g) {
					iScope.groupId = g.id;
					iScope.groupName = g.name;

					group.getId(g.id).success(function (data) {
						iScope.perms = data.permissions;
						iScope.qtyPerms = iScope.perms.length;
					});

					angular.element('#viewPermissions').foundation('reveal', 'open');
				};

				iScope.addPermissions = function (id) {
					var g, i, l;
					
					for (i = 0, l = iScope.permissions.length; i < l; i += 1) {
						iScope.permissions[i].checked = false;
					}

					group.getId(id).success(function (data) {
						g = data;
						iScope.gId = data.id;

						for (i = 0, l = g.permissions.length; i < l; i += 1) {
							inPermissions(g.permissions[i]);
						}
						
					});

					angular.element('#addPermissions').foundation('reveal', 'open');
				};

				iScope.addToGroup = function () {
					var i, l;
					var perms = [];
					for (i = 0, l = iScope.permissions.length; i < l; i += 1) {
						if (iScope.permissions[i].checked) {
							perms.push(iScope.permissions[i].id);
						}
					}
					
					group.save(iScope.gId, {permissions: perms});
					angular.element('#addPermissions').foundation('reveal', 'close');
				}
			}
		}
	}]);