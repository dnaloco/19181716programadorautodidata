<?php
namespace Blog\Models;

use Base\Core\ModelBase;

final class PermissionModel extends ModelBase
{
	public function __construct($em)
	{
		self::$_entity = 'Blog\Entities\Permission';
		parent::__construct($em);		
	}

	public function save ($data)
	{
	    $permission = parent::save($data);
	    return $this->permissionArray($permission);
	}

	public function update($id, $data)
	{
	    $permission = parent::update($id, $data);
	    return $this->permissionArray($permission);
	}

	public function delete($id)
	{
	    $permission = parent::delete($id);
	    return $this->permissionArray($permission);
	}

	public function permissionArray ($permission)
	{
	    if (is_string($permission)) {
	            return array(
	                    'error' => $permission
	            );
	    } else if ($permission instanceof \Blog\Entities\Permission) {
	            return array(
	                    'id' => $permission->getId(),
	                    'permission' => $permission->getPermission(),
	            );
	    } else {
	            return $permission;
	    }
	}
}