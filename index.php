<?php
require 'bootstrap.php';
/*
$p1 = new Blog\Models\PermissionModel($em);

$t = $p1->save(array('permission'=>'nada2'));
var_dump($t);*/

// $g1 = new Blog\Models\GroupModel($em);

// $p1 = $em->find('Blog\Entities\Permission', 1);
// $p2 = $em->find('Blog\Entities\Permission', 2);
// $p3 = $em->find('Blog\Entities\Permission', 3);
// $p4 = $em->find('Blog\Entities\Permission', 4);


// $g1 = $em->find('Blog\Entities\Group', 1);

// $g1->setPermissions(array($p1,$p2,$p3,$p4));
// $em->persist($g1);
// $em->flush();

/*$g1 = new Blog\Models\StatusModel($em);

$t = $g1->update(1, array('status'=>'uiqyhwshaa'));

var_dump($t);

*/

/*$g1 = $em->find('Blog\Entities\Group', 1);
var_dump($g1); */
/*$g = new Blog\Controllers\GroupController($em);
$t = $g->get();

var_dump($t);

die('testes');*/

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

$router->any('/rest/groups/*', 'Blog\Controllers\GroupController', array($em))
->accept(array(
		'application/json' => 'json_encode'
	));

$router->any('/rest/permissions/*', 'Blog\Controllers\PermissionController', array($em))
->accept(array(
		'application/json' => 'json_encode'
	));

/*$router->any('/rest/post/*', 'Blog\Controllers\BlogController', array($em))
->accept(array(
		'text/html' => function ($data) {
			return render::renderHtml(array('layout'=>'default-angular-index.html'), $data);
		}
	));*/
