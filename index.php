<?php
require 'bootstrap.php';

use Respect\Rest\Router;
use Base\Helpers\RenderHelper as render;

$router = new Router('/index.php/');

$router->get(['/*', '/post/*', '/post-form/*'], function ($id = NULL) {
	$data = array(
		'site' => 'Programador Autodidata'
		);
	return render::renderHtml(array('layout'=>'default-angular-index.html'), $data);
});

/*$router->any('/rest/post/*', 'Blog\Controllers\BlogController', array($em))
->accept(array(
		'text/html' => function ($data) {
			return render::renderHtml(array('layout'=>'default-angular-index.html'), $data);
		}
	));*/
