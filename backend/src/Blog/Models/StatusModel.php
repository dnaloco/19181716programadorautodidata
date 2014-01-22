<?php
namespace Blog\Models;

use Base\Core\ModelBase;

final class StatusModel extends ModelBase
{
	public function __construct($em)
	{
		self::$_entity = 'Blog\Entities\Status';
		$_em = $em;
	}
}