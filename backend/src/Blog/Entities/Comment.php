<?php 
namespace Blog\Entities;

/**
 * @Entity @Table(name="comments")
 */
final class Comment
{
	/**
	 * @Id @Column(type="integer")
	 * @GeneratedValue
	 */
	private $id;

	/**
	 * @Column(type="text")
	 */
	private $comment;
}