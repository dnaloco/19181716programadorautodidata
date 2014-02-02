BlogApp.config(
	['$routeProvider',
	function ($routeProvider) {
		$routeProvider
		.when('/', {
			templateUrl: '/frontend/partials/blog/home.html',
			controller: 'HomeCtrl'
		})
		.when('/artigos/:id',
		{
			templateUrl: '/frontend/partials/blog/artigos.html',
			controller: 'ArtigosCtrl'
		})
		.when('/aplicativos/tetris',
		{
			templateUrl: '/frontend/partials/blog/aplicativos/tetris.html',
			controller: 'TetrisCtrl'
		})
		.when('/aplicativos/todolist',
		{
			templateUrl: '/frontend/partials/blog/aplicativos/todolist.html',
			controller: 'TodoListCtrl'
		})
		.when('/aplicativos/razonete',
		{
			templateUrl: '/frontend/partials/blog/aplicativos/razonete.html',
			controller: 'RazoneteCtrl'
		})
		.when('/aplicativos',
		{
			templateUrl: '/frontend/partials/blog/aplicativos.html',
			controller: 'AplicativosCtrl'
		})
		.when('/curriculo',
		{
			templateUrl: '/frontend/partials/blog/curriculo.html',
			controller: 'CurriculoCtrl'
		})
		.when('/trabalhos',
		{
			templateUrl: '/frontend/partials/blog/trabalhos.html',
			controller: 'TrabalhosCtrl'
		})
		.when('/contatos',
		{
			templateUrl: '/frontend/partials/blog/contatos.html',
			controller: 'ContatosCtrl'
		})
		.when('/login/:request',
		{
			templateUrl: '/frontend/partials/blog/login.html',
			controller: 'LoginCtrl'
		})
		.otherwise({
			redirectTo: '/'
		});
	}]);