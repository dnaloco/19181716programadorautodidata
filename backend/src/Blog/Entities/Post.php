<?php 
namespace Blog\Entities;

/**
 * @Entity
 * @Table(name="posts")
 */
final class Post
{
	/**
	 * @Id @Column(type="integer")
	 * @GeneratedValue
	 */
	private $id;

	/**
	 * @ManyToOne(targetEntity="User")
	 * @JoinColumn(name="user_id", referencedColumnName="id")
	 */
	private $author;

	/**
	 * @Column(length=140)
	 */
	private $title;

	/**
	 * @Column(type="text")
	 */
	private $content;

	/**
	 * @Column(type="datetime")
	 */
	private $created;

	/**
	 * @Column(type="datetime")
	 */
	private $changed;

	/**
	 * @Column(type="datetime")
	 */
	private $pubDate;

	/**
	 * @ManyToOne(targetEntity="Category")
	 * @JoinColumn(name="category_id", referencedColumnName="id")
	 */
	private $category;


	/**
	 * @ManyToMany(targetEntity="Tag")
	 * @JoinTable(
	 * 		name="post_tags",
	 * 		joinColumns={@JoinColumn(name="post_id", referencedColumnName="id")},
	 *		inverseJoinColumns={@JoinColumn(name="tag_id", referencedColumnName="id", unique=true)} 
	 * )
	 */
	private $tags;

	/**
	 * @ManyToOne(targetEntity="Status")
	 * @JoinColumn(name="status_id", referencedColumnName="id")
	 */
	private $status;

	/**
	 * @Column(type="smallint")
	 */
	private $rating;

	/**
	 * @Column(type="smallint")
	 */
	private $commentCount;

	/**
	 * @ManyToMany(targetEntity="Comment")
	 * @JoinTable(
	 * 		name="post_comments",
	 * 		joinColumns={@JoinColumn(name="post_id", referencedColumnName="id")},
	 *		inverseJoinColumns={@JoinColumn(name="comment_id", referencedColumnName="id", unique=true)} 
	 * )
	 */
	private $comments;

	public function __construct()
	{
		$this->tags = new \Doctrine\Common\Collections\ArrayCollection();
		$this->comments = new \Doctrine\Common\Collections\ArrayCollection();
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
     * Gets the value of author.
     *
     * @return mixed
     */
    public function getAuthor()
    {
        return $this->author;
    }
    
    /**
     * Sets the value of author.
     *
     * @param mixed $author the author
     *
     * @return self
     */
    public function setAuthor($author)
    {
        $this->author = $author;

        return $this;
    }

    /**
     * Gets the value of title.
     *
     * @return mixed
     */
    public function getTitle()
    {
        return $this->title;
    }
    
    /**
     * Sets the value of title.
     *
     * @param mixed $title the title
     *
     * @return self
     */
    public function setTitle($title)
    {
        $this->title = $title;

        return $this;
    }

    /**
     * Gets the value of content.
     *
     * @return mixed
     */
    public function getContent()
    {
        return $this->content;
    }
    
    /**
     * Sets the value of content.
     *
     * @param mixed $content the content
     *
     * @return self
     */
    public function setContent($content)
    {
        $this->content = $content;

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
     * Gets the value of changed.
     *
     * @return mixed
     */
    public function getChanged()
    {
        return $this->changed;
    }
    
    /**
     * Sets the value of changed.
     *
     * @param mixed $changed the changed
     *
     * @return self
     */
    public function setChanged($changed)
    {
        $this->changed = $changed;

        return $this;
    }

    /**
     * Gets the value of pubDate.
     *
     * @return mixed
     */
    public function getPubDate()
    {
        return $this->pubDate;
    }
    
    /**
     * Sets the value of pubDate.
     *
     * @param mixed $pubDate the pub date
     *
     * @return self
     */
    public function setPubDate($pubDate)
    {
        $this->pubDate = $pubDate;

        return $this;
    }

    /**
     * Gets the value of category.
     *
     * @return mixed
     */
    public function getCategory()
    {
        return $this->category;
    }
    
    /**
     * Sets the value of category.
     *
     * @param mixed $category the category
     *
     * @return self
     */
    public function setCategory($category)
    {
        $this->category = $category;

        return $this;
    }

    /**
     * Gets the name="post_tags",
     *
     * @return mixed
     */
    public function getTags()
    {
        return $this->tags;
    }
    
    /**
     * Sets the name="post_tags",
     *
     * @param mixed $tags the tags
     *
     * @return self
     */
    public function setTags($tags)
    {
        $this->tags = $tags;

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
     * Gets the value of rating.
     *
     * @return mixed
     */
    public function getRating()
    {
        return $this->rating;
    }
    
    /**
     * Sets the value of rating.
     *
     * @param mixed $rating the rating
     *
     * @return self
     */
    public function setRating($rating)
    {
        $this->rating = $rating;

        return $this;
    }

    /**
     * Gets the value of commentCount.
     *
     * @return mixed
     */
    public function getCommentCount()
    {
        return $this->commentCount;
    }
    
    /**
     * Sets the value of commentCount.
     *
     * @param mixed $commentCount the comment count
     *
     * @return self
     */
    public function setCommentCount($commentCount)
    {
        $this->commentCount = $commentCount;

        return $this;
    }

    /**
     * Gets the name="post_tags",
     *
     * @return mixed
     */
    public function getComments()
    {
        return $this->comments;
    }
    
    /**
     * Sets the name="post_tags",
     *
     * @param mixed $comments the comments
     *
     * @return self
     */
    public function setComments($comments)
    {
        $this->comments = $comments;

        return $this;
    }
}