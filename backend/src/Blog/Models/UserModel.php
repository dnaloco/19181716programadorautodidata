<?php
namespace Blog\Models;

use Base\Core\ModelBase,
	Base\Helpers\AuthHelper,
	Auth\Core\AuthModel,
	DoctrineModule\Stdlib\Hydrator\DoctrineObject as DoctrineHydrator;

final class UserModel extends ModelBase
{
	static private $auth;
	static protected $_entity;
	private static $hydrator;

	public function __construct($em)
	{
		self::$_entity = 'Blog\Entities\User';
		parent::__construct($em);
		self::$auth = new AuthModel($em);
		self::$hydrator = new DoctrineHydrator($em, static::$_entity);

	}

	public function save ($data)
	{
		$userEntity = new static::$_entity();

		$hasUser = self::$auth->hasUser($data['user']);
		$hasEmail = self::$auth->hasEmail($data['email']);

		if (!empty($hasUser) || !empty($hasEmail)) {
			return 'Já existe um usuário e/ou email informado!';
		}
		
		$salt = AuthHelper::createSalt();
		$hash = AuthHelper::createHash($salt, $data['password']);

		unset($data['password']);

		$data['status'] = 1; // registrado
		$data['salt'] = $salt;
		$data['hash'] = $hash;
		$data['created'] = date('Y-m-d H:i:s');
		$data['activationKey'] = AuthHelper::createActivationKey($data['email']);

        $userEntity = self::$hydrator->hydrate($data, $userEntity);

        try {
            self::$em->persist($userEntity);
            self::$em->flush();
        } catch(\Doctrine\DBAL\DBALException $e) {
            return $e->getMessage();
        }

        $sendActivation = self::$auth->sendActivationKey($userEntity);

        if (!$sendActivation) {
        	return "Não foi possível enviar a chave de ativação";
        }

        return $userEntity->getId();
	}
}