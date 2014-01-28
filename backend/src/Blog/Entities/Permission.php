<?php
namespace Blog\Entities;

/**
 * @Entity @Table(name="permissions")
 */
final class Permission
{
	/**
	 * @Id @Column(type="integer")
	 * @GeneratedValue
	 */
	private $id;

	/**
	 * @Column(length=20, unique=true)
	 */
	private $permission;

    /**
     * Gets the value of id.
     *
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
    }
    
    /**
     * Sets the value of id.
     *
     * @param mixed $id the id
     *
     * @return self
     */
    public function setId($id)
    {
        $this->id = $id;

        return $this;
    }

    /**
     * Gets the value of permission.
     *
     * @return mixed
     */
    public function getPermission()
    {
        return $this->permission;
    }
    
    /**
     * Sets the value of permission.
     *
     * @param mixed $permission the permission
     *
     * @return self
     */
    public function setPermission($permission)
    {
        $this->permission = $permission;

        return $this;
    }
}