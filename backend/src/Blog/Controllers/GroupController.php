<?php 
namespace Blog\Controllers;

use Base\Core\ControllerRoutable;
use Blog\Models\GroupModel;

final class GroupController extends ControllerRoutable
{
	protected static $model;

	public function __construct ($em)
	{
		self::$model = new GroupModel($em);
	}

}