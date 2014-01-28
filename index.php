<?php
require 'bootstrap.php';



use Respect\Rest\Router;
use Base\Helpers\RenderHelper as render;

$router = new Router('/index.php/');

$router->get(['/admin/*/**'], function () {
	$data = array(
		'site' => 'Programador Autodidata'
		);
	return render::renderHtml(array('layout'=>'admin-index.html'), $data);
});

$router->get(['/', '/post/*', '/post-form/*'], function ($id = NULL) {
	$data = array(
		'site' => 'Programador Autodidata'
		);
	return render::renderHtml(array('layout'=>'default-index.html'), $data);
});

$router->any('/rest/status/*', 'Blog\Controllers\StatusController', array($em))
->accept(array(
		'application/json' => 'json_encode'
	));

/*$router->any('/rest/post/*', 'Blog\Controllers\BlogController', array($em))
->accept(array(
		'text/html' => function ($data) {
			return render::renderHtml(array('layout'=>'default-angular-index.html'), $data);
		}
	));*/
