BlogApp.directive('homeBanner',
	function () {
		return {
			templateUrl: '/frontend/partials/blog/directives/banner-home.html',
			link: function (scope, element, attrs) {
				$(document).foundation({
					orbit: {
						animation: 'slide',
						timer_speed: 3000,
						pause_on_hover: true,
						animation_speed: 500,
						navigation_arrows: true,
						bullets: false
					}
				});
			}
		};
	});