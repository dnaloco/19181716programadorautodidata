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

	private $author;

	private $title;

	private $content;

	private $created;

	private $changed;

	private $pubDate;

	private $category_id;

	private $status;

	private $rating;

	private $commentCount;
}