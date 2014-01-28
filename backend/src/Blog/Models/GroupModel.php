<?php
namespace Blog\Models;

use Base\Core\ModelBase;

final class GroupModel extends ModelBase
{
	public function __construct($em)
	{
		self::$_entity = 'Blog\Entities\Group';
		parent::__construct($em);
	}

	public function getEntities ($options = array())
	{
		$groups = parent::getEntities($options);

		for ($i = 0, $len = count($groups); $i < $len; $i += 1) {
			$permissions = self::$em->find('Blog\Entities\Group', $groups[$i]['id']);
			$permissions = $this->permissionsToArray($permissions->getPermissions());
			$groups[$i]['permissions'] = $permissions;
		}

		return $groups;
	}

	public function permissionsToArray ($permissions)
	{
		$pToArray = array();
		foreach($permissions as $p) {
			array_push($pToArray, array('id'=>$p->getId(), 'permission'=>$p->getPermission()));
		}
		return $pToArray;
	}

	public function getEntity ($id)
	{
		$group = parent::getEntity($id);

		$permissions = self::$em->find('Blog\Entities\Group', $group['id']);
		$permissions = $this->permissionsToArray($permissions->getPermissions());
		$group['permissions'] = $permissions;

		return $group;
	}

	public function save ($data)
	{
	    $group = parent::save($data);
	    return $this->groupArray($group);
	}

	public function update($id, $data)
	{
        $groupEntity = self:: $em->find(static::$_entity, $id);

        if($data['permissions']) {
        	$groupEntity->getPermissions()->clear();
        	foreach($data['permissions'] as $id) {
        		$p = self::$em->find('Blog\Entities\Permission', $id);
        		try {
        			$groupEntity->getPermissions()->add($p);
	        		self::$em->persist($groupEntity);
	            	self::$em->flush();	
        		} catch (Exception $e) {
        			return $e->getMessage();
        		}
        		
        	}
        }

	    return $this->groupArray($groupEntity);
	}

	public function delete($id)
	{
	    $group = parent::delete($id);
	    return $this->groupArray($group);
	}

	public function groupArray ($group)
	{
	    if (is_string($group)) {
	            return array(
	                    'error' => $group
	            );
	    } else if ($group instanceof \Blog\Entities\Group) {
	            return array(
	                    'id' => $group->getId(),
	                    'name' => $group->getName(),
	                    'permissions' => $group->getPermissions()->toArray()
	            );
	    } else {
	            return $group;
	    }
	}

}