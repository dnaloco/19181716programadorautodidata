<?php 
namespace Blog\Controllers;

use Base\Core\ControllerRoutable;
use Blog\Models\PermissionModel;

final class PermissionController extends ControllerRoutable
{
	protected static $model;

	public function __construct ($em) {
		self::$model = new PermissionModel($em);
	}
}