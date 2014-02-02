BlogApp.factory('pecaFactory',
	[function () {
		this.nome = null;
		this.jogo = null;
		
		return {
			send: function (message, to) {
				this.jogo.send(message, this, to);
			},
			receive: function (message, from) {
				
			}
		};
	}]);