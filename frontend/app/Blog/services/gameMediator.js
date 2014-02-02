BlogApp.factory('jogoMediator',
	[function (name) {
		var colleagues = {};

		return {
			register: function (colleague) {
				colleagues[colleague.nome] = colleague;
				colleague.jogo = this;
			},
			send: function (message, from, to) {
				if (to) {
					to.receive(message, from);
				} else {
					for (key in colleagues) {
						if(colleagues[key] !== from) {
							colleagues[key].receive(message, from);
						}
					}
				}
			}
		};

	}]);