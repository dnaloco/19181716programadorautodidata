BlogApp.directive('homeHeader',
	function () {
		return {
			restrict: 'A',
			replace: true,
			template: "<div class='header-title'></div>",
			link: function (scope, iElement, iAttrs) {
				var siteTitle = iElement.data('homeHeader'),
					htmlString = '<h1>' + siteTitle + '</h1>',
					githubAddress = iElement.data('githubAddress'),
					linkGithub = '<a target="_blank" href="' + githubAddress +
								 '">Veja o projeto deste site no github!</a>';
				htmlString += '<p>' + linkGithub + '<p>';
				iElement.html(htmlString);
			}
		};
	});