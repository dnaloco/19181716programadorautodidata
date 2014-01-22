<?php 
namespace Blog\Entities;

/**
 * @Entity
 */
final class PostTags
{
	/**
	 * @ManyToMany(targetEntity="PostTags")
	 * @JoinTable(name="post_tags",
	 * 		joinColumns={@JoinColumn(name="post_id", referencedColumnName="id")},
	 *		inverseJoinColumns={@JoinColumn(name="tag_id", referencedColumnName="id", unique=true)} 
	 * )
	 */
	private $postTags;

	public function __construct()
	{
		$this->postTags =new \Doctrine\Common\Collections\ArrayCollection();
	}



    /**
     * Gets the joinColumns={@JoinColumn(name="post_id", referencedColumnName="id")},
     *
     * @return mixed
     */
    public function getPostTags()
    {
        return $this->postTags;
    }
    
    /**
     * Sets the joinColumns={@JoinColumn(name="post_id", referencedColumnName="id")},
     *
     * @param mixed $postTags the post tags
     *
     * @return self
     */
    public function setPostTags($postTags)
    {
        $this->postTags = $postTags;

        return $this;
    }
}