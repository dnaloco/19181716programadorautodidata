<?php
namespace Blog\Models;

use Base\Core\ModelBase;

final class CategoryModel extends ModelBase
{
	public function __construct($em)
	{
		self::$_entity = 'Blog\Entities\Category';
		parent::__construct($em);		
	}
}