<?php 
namespace Blog\Entities;

/**
 * @Entity @Table(name="tags")
 */
final class Tag
{
	/**
	 * @Id @Column(type="integer")
	 * @GeneratedValue
	 */
	private $id;

	/**
	 * @Column(length=20)
	 */
	private $tag;

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
     * Gets the value of tag.
     *
     * @return mixed
     */
    public function getTag()
    {
        return $this->tag;
    }
    
    /**
     * Sets the value of tag.
     *
     * @param mixed $tag the tag
     *
     * @return self
     */
    public function setTag($tag)
    {
        $this->tag = $tag;

        return $this;
    }
} 	