<?php 
namespace Blog\Controllers;

use Base\Core\ControllerRoutable;
use Blog\Models\UserModel;

final class UserController extends ControllerRoutable
{
	protected static $model;

	public function __construct ($em) {
		self::$model = new UserModel($em);
	}
}