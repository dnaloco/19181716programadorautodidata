<?php 
namespace Base\Helpers;

use Base\Helpers\NotInstantiable;

class AuthHelper extends NotInstantiable
{

	static public function createActivationKey ($email)
	{
		return sha1(mt_rand(10000,99999).time().$email);
	}

	static public function createSalt ($tamanho = 28)
	{
		return substr(sha1(mt_rand()), 0, $tamanho);
	}

	static public function createHash ($salt, $password)
	{
		$hash = md5($salt . $password);

		for ($i = 0; $i < 1000; $i++) {
			$hash = md5($hash);
		}

		return $hash;
	}
}