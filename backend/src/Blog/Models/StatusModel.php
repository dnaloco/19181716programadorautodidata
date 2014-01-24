<?php
namespace Blog\Models;

use Base\Core\ModelBase;

final class StatusModel extends ModelBase
{
	public function __construct ($em)
	{
		self::$_entity = 'Blog\Entities\Status';
		parent::__construct($em);		
	}

	public function save ($data)
	{
		$status = parent::save($data);

	}

	public function statusArray ($status)
	{
		if(is_string($status)) {
			
		}
	}
}