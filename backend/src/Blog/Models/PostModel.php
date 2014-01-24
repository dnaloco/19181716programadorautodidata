<?php
namespace Blog\Models;

use Base\Core\ModelBase;

final class PostModel extends ModelBase
{
	public function __construct($em)
	{
		self::$_entity = 'Blog\Entities\Post';
		parent::__construct($em);		
	}
}