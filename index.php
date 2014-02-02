<?php
session_start();

require 'bootstrap.php';

use Respect\Rest\Router;
use Base\Helpers\RenderHelper as render;

$router = new Router('/index.php/');

$data = array();

if (isset($_SESSION['logged']) && $_SESSION['logged']) {
	$data['user'] = $_SESSION['user'];
} else {
	unset($data['user']);
}

$router->get(['/admin/*/**'], function () {
	global $data;
	$data['sites'] = 'Admin - Programador Autodidata';

	if(isset($_SESSION['logged']) && $_SESSION['logged']) {
		return render::renderHtml(array('layout'=>'admin-index.html'), $data);
	} else {
		$request = $_SERVER['REQUEST_URI'];
		header("Location: http://local.programadorautodidata/login".$request);
	}
	
});

$router->post('/login/*', function ($request) {

	if ($_POST['user'] === 'arthur' && $_POST['password'] === '123456') { 
		$_SESSION['logged'] = true;
		$_SESSION['user'] = $_POST['user'];
		$data['user'] = $_POST['user'];

		header("Location: http://local.programadorautodidata/" . $request);
	}

	return 'você precisa logar';
});

$router->get(
	['/',
	'/artigos/*', 
	'/aplicativos/*', 
	'/curriculo',
	'/trabalhos',
	'/contatos',
	'/login/*'], 
	function ($id = NULL) {
		global $data;

		$data['site'] = 'Programador Autodidata';
		return render::renderHtml(array('layout'=>'blog-index.html'), $data);
	});

$router->get('/activate/*', function ($akey) {
	global $em;

	$userEntity = 'Blog\Entities\User';
	$statusEntity = 'Blog\Entities\Status';

	$qb = $em->createQueryBuilder();

    $qb->select('e')->from($userEntity, 'e')
    	->where("e.activationKey = '" . $akey . "'");

	$result = $em->createQuery($qb)->getArrayResult();

    if (count($result) === 1) {
    	$user = $em->find($userEntity, $result[0]['id']);
    	$user->setActivationKey(null);

    	$status = $em->find($statusEntity, 2);

    	$user->setStatus($status);

    	try {
            $em->persist($user);
    		$em->flush();
        } catch (\Doctrine\ORM\ORMInvalidArgumentException $e) {
            return $e->getMessage();
        }

        return $user;
    }

	return false;
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
