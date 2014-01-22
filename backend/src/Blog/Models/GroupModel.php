<?php
namespace Blog\Models;

use Base\Core\ModelBase;

final class GroupModel extends ModelBase
{
	public function __construct($em)
	{
		self::$_entity = 'Blog\Entities\Group';
		$_em = $em;
	}
}