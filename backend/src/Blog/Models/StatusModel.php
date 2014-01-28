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

        public function update($id, $data)
        {
                $status = parent::update($id, $data);
                return $this->statusArray($status);
        }

        public function delete($id)
        {
                $status = parent::delete($id);
                return $this->statusArray($status);
        }

        public function statusArray ($status)
        {
                if (is_string($status)) {
                        return array(
                                'error' => $status
                        );
                } else if ($status instanceof \Blog\Entities\Status) {
                        return array(
                                'id' => $status->getId(),
                                'status' => $status->getStatus(),
                                'type' => $status->getType()
                        );
                } else {
                        return $status;
                }
        }
}