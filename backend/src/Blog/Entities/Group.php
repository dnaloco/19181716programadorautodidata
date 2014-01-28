<?php 
namespace Blog\Entities;

/**
 * @Entity @Table(name="groups")
 */
final class Group
{
	/**
	 * @Id @Column(type="integer")
	 * @GeneratedValue
	 */
	private $id;

	/**
	 * @Column(length=20, unique=true)
	 */
	private $name;

	/**
	 * @ManyToMany(targetEntity="Permission")
	 * @JoinTable(
	 * 		name="group_permissions",
	 * 		joinColumns={@JoinColumn(name="group_id", referencedColumnName="id")},
	 *		inverseJoinColumns={@JoinColumn(name="permission_id", referencedColumnName="id")} 
	 * )
	 */
	private $permissions;

    public function __construct()
    {
        $this->permissions = new \Doctrine\Common\Collections\ArrayCollection();
    }

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
     * Gets the value of name.
     *
     * @return mixed
     */
    public function getName()
    {
        return $this->name;
    }
    
    /**
     * Sets the value of name.
     *
     * @param mixed $name the name
     *
     * @return self
     */
    public function setName($name)
    {
        $this->name = $name;

        return $this;
    }

    /**
     * Gets the name="group_permissions",
     *
     * @return mixed
     */
    public function getPermissions()
    {
        return $this->permissions;
    }
    
    /**
     * Sets the name="group_permissions",
     *
     * @param mixed $permissions the permissions
     *
     * @return self
     */
    public function setPermissions($permissions)
    {
        $this->permissions = $permissions;

        return $this;
    }
}