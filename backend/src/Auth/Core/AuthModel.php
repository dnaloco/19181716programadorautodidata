<?php 
namespace Auth\Core;

use Base\Helpers\EmailHelper;

final class AuthModel
{
	private static $user;
	private static $em;

	public function __construct ($em)
	{
		self::$em = $em;
		self::$user = 'Blog\Entities\User';
	}

	public function isLogged ($user)
	{
		if(isset($_SESSION['logged']) && $_SESSION['logged']) {
			return true;
		}

		return false;
	}

	public function hasUser ($user)
	{
		$qb = self::$em->createQueryBuilder();
		$qb->select('e')
		 	->from(self::$user, 'e')
		 	->where("e.user = '" . $user . "'");

		$result = self::$em->createQuery($qb)->getResult();

		return $result;
	}

	public function hasEmail ($email)
	{
		$qb = self::$em->createQueryBuilder();
		$qb->select('e')
		 	->from(self::$user, 'e')
		 	->where("e.email = '" . $email ."'");

		$result = self::$em->createQuery($qb)->getResult();

		return $result;
	}

	public function checkPassword ($pass, $salt, $hash)
	{
		// $hash = 
	}

	public function hasActivationKey($activation_key)
	{
		$qb = self::$em->createQueryBuilder();
		$qb->select('e')
		 	->from(self::$user, 'e')
		 	->where("e.activationKey = '" . $activation_key ."'");

		$result = self::$em->createQuery($qb)->getResult();

		return $result;
	}

	public function getActivationKey ($id)
	{
		$qb = self::$em->createQueryBuilder();
		$qb->select('e')
			->from(self::$user, 'e')
			->where("e.id = '" . $id . "'");

		$result = self::$em->createQuery($qb)->getArrayResult();

		return $result[0]['activationKey'];
	}

	public function sendActivationKey ($user)
	{
		$email =  $user->getEmail();
		$akey = $user->getActivationKey();
		$subject = "Programador Autodidata - Activation Key";

		$body = <<<EMAIL
		<!DOCTYPE html>
		<html>
		<head>
			<title>Teste de Correio</title>
		</head>
		<body>
			<h1>Olá, isso é um teste</h1>
			<p>
				<a href="http://local.programadorautodidata/activate/$akey">Ativar Cadastro</a>
			</p>
		</body>
		</html>
EMAIL;
		return EmailHelper::SendEmail($email, $subject, $body);
	}

	public function login ($user, $pass)
	{

	}

	public function logout ($user)
	{

	}
}