<?php
namespace Blog\Entities;

/**
 * @Entity @Table(name="users")
 */
final class User
{
	/**
	 * @Id @Column(type="integer")
	 * @GeneratedValue
	 */
	private $id;

	/**
	 * @Column(length=150)
	 */
	private $user;

	/**
	 * @Column(length=20)
	 */
	private $firstName;

	/**
	 * @Column(length=50)
	 */
	private $lastName;

	/**
	 * @Column(length=150)
	 */
	private $email;

	/**
	 * @Column(length=32)
	 */
	private $salt;

	/**
	 * @Column(length=32)
	 */
	private $hash;

	/**
	 * @Column(type="datetime")
	 */
	private $created;

	/**
	 * @ManyToOne(targetEntity="Status")
	 * @JoinColumn(name="status_id", referencedColumnName="id")
	 */
	private $status;

	/**
	 * @Column(length=40, unique=true, nullable=true)
	 */
	private $activationKey;

	/**
	 * @Column(type="datetime", nullable=true)
	 */
	private $last_login;

	/**
	 * @ManyToOne(targetEntity="Group")
	 * @JoinColumn(name="group_id", referencedColumnName="id")
	 */
	private $group;

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
     * Gets the value of user.
     *
     * @return mixed
     */
    public function getUser()
    {
        return $this->user;
    }
    
    /**
     * Sets the value of user.
     *
     * @param mixed $user the user
     *
     * @return self
     */
    public function setUser($user)
    {
        $this->user = $user;

        return $this;
    }

    /**
     * Gets the value of fistName.
     *
     * @return mixed
     */
    public function getFirstName()
    {
        return $this->firstName;
    }
    
    /**
     * Sets the value of fistName.
     *
     * @param mixed $fistName the fist name
     *
     * @return self
     */
    public function setFirstName($firstName)
    {
        $this->firstName = $firstName;

        return $this;
    }

    /**
     * Gets the value of lastName.
     *
     * @return mixed
     */
    public function getLastName()
    {
        return $this->lastName;
    }
    
    /**
     * Sets the value of lastName.
     *
     * @param mixed $lastName the last name
     *
     * @return self
     */
    public function setLastName($lastName)
    {
        $this->lastName = $lastName;

        return $this;
    }

    /**
     * Gets the value of email.
     *
     * @return mixed
     */
    public function getEmail()
    {
        return $this->email;
    }
    
    /**
     * Sets the value of email.
     *
     * @param mixed $email the email
     *
     * @return self
     */
    public function setEmail($email)
    {
        $this->email = $email;

        return $this;
    }

    /**
     * Gets the value of salt.
     *
     * @return mixed
     */
    public function getSalt()
    {
        return $this->salt;
    }
    
    /**
     * Sets the value of salt.
     *
     * @param mixed $salt the salt
     *
     * @return self
     */
    public function setSalt($salt)
    {
        $this->salt = $salt;

        return $this;
    }

    /**
     * Gets the value of hash.
     *
     * @return mixed
     */
    public function getHash()
    {
        return $this->hash;
    }
    
    /**
     * Sets the value of hash.
     *
     * @param mixed $hash the hash
     *
     * @return self
     */
    public function setHash($hash)
    {
        $this->hash = $hash;

        return $this;
    }

    /**
     * Gets the value of created.
     *
     * @return mixed
     */
    public function getCreated()
    {
        return $this->created;
    }
    
    /**
     * Sets the value of created.
     *
     * @param mixed $created the created
     *
     * @return self
     */
    public function setCreated($created)
    {
        $this->created = $created;

        return $this;
    }

    /**
     * Gets the value of status.
     *
     * @return mixed
     */
    public function getStatus()
    {
        return $this->status;
    }
    
    /**
     * Sets the value of status.
     *
     * @param mixed $status the status
     *
     * @return self
     */
    public function setStatus($status)
    {
        $this->status = $status;

        return $this;
    }

    /**
     * Gets the value of activationKey.
     *
     * @return mixed
     */
    public function getActivationKey()
    {
        return $this->activationKey;
    }
    
    /**
     * Sets the value of activationKey.
     *
     * @param mixed $activationKey the activation key
     *
     * @return self
     */
    public function setActivationKey($activationKey)
    {
        $this->activationKey = $activationKey;

        return $this;
    }

    /**
     * Gets the value of last_login.
     *
     * @return mixed
     */
    public function getLast_login()
    {
        return $this->last_login;
    }
    
    /**
     * Sets the value of last_login.
     *
     * @param mixed $last_login the last_login
     *
     * @return self
     */
    public function setLast_login($last_login)
    {
        $this->last_login = $last_login;

        return $this;
    }

    /**
     * Gets the value of group.
     *
     * @return mixed
     */
    public function getGroup()
    {
        return $this->group;
    }
    
    /**
     * Sets the value of group.
     *
     * @param mixed $group the group
     *
     * @return self
     */
    public function setGroup($group)
    {
        $this->group = $group;

        return $this;
    }
}