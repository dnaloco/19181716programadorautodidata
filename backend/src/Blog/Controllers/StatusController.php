<?php
namespace Blog\Controllers;

use Base\Core\ControllerRoutable,
	Blog\Model\StatusModel;

final class StatusController extends ControllerRoutable
{
	public function __construct ($em)
	{
		self::$model = new StatusModel($em);
	}	
}