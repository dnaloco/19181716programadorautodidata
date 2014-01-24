<?php
namespace Blog\Models;

use Base\Core\ModelBase;

final class UserModel extends ModelBase
{
	public function __construct($em)
	{
		parent::__construct($em);
		self::$_entity = 'Blog\Entities\User';
	}
}