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
		return $this->statusArray($status);
	}

	public function statusArray ($status)
	{
		if (is_string($status)) {
			return array(
				'error' => $status
				);
		} else if ($status instanceof Status) {
			return array(
				'id' => $status->getId(),
				'status' => $status->getStatus(),
				'type' => $status->getType()
				);
		} else {
			return null;
		}
	}
}