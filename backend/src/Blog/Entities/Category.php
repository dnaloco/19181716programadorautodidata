<?php 
namespace Blog\Entities;

/**
 * @Entity @Table(name="categories")
 */
final class Category
{
	/**
	 * @Id @Column(type="integer")
	 * @GeneratedValue
	 */
	private $id;

	/**
	 * @OneToOne(targetEntity="Category")
	 * @JoinColumn(name="parent_id", referencedColumnName"id")
	 */
	private $category;

	private $parent_id;
}