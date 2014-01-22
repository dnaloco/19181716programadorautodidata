<?php
namespace Auth\Entities;

final class User
{
	private $id;
	private $user;
	private $fistName;
	private $lastName;
	private $email;
	private $password;
	private $salt;
	private $hash;
	private $created;
	private $status;
	private $activationKey;
	private $last_login;
	private $group;
}