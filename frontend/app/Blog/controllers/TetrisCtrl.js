BlogApp.controller('TetrisCtrl',
	['$scope', 'jogadorFactory', 'pecaFactory', 'jogoMediator',
	function ($scope, jogador, peca, jogo) {
		$scope.showCanvas = false;
	}]);