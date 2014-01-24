<?php
namespace Blog\Models;

use Base\Core\ModelBase;

final class PermissionModel extends ModelBase
{
	public function __construct($em)
	{
		self::$_entity = 'Blog\Entities\Permission';
		parent::__construct($em);		
	}
}