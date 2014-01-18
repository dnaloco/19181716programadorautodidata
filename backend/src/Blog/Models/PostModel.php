<?php
namespace Blog\Models;

final class PostModel extends ModelBase
{
	public function __construct($em) {
		self::$_entity = 'Blog\Entities\Post';
		$_em = $em;
	}
}