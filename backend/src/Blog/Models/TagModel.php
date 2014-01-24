<?php
namespace Blog\Models;

use Base\Core\ModelBase;

final class TagModel extends ModelBase
{
	public function __construct($em)
	{
		parent::__construct($em);
		self::$_entity = 'Blog\Entities\Tag';
	}
}