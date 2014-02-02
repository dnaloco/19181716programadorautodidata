<?php 
namespace Base\Core;

use DoctrineModule\Stdlib\Hydrator\DoctrineObject as DoctrineHydrator;

abstract class ModelBase
{
    protected static $em;
    private static $hydrator;
    private $filter;
    protected static $_entity;

    public function __construct ($em)
    {
        self::$em = $em;
        self::$hydrator = new DoctrineHydrator($em, static::$_entity);
    }

    public function getEntities ($options = array())
    {
        $qb = self::$em->createQueryBuilder();
        $qb->select('e')
            ->from(static::$_entity, 'e');

        if (array_key_exists('offset', $options)) {
            $qb->setFirstResult($options['offset']);
        }

        if (array_key_exists('limit', $options)) {
            $qb->setMaxResults($options['limit']);
        }
        
        if (array_key_exists('orderby', $options)) {
            $qb->orderBy('e' . '.' . $options['orderby']);
        }

        return self::$em->createQuery($qb)->getArrayResult();
    }

    public function getEntity ($id)
    {
        $qb = self::$em->createQueryBuilder();
        $qb->select('e')->from(static::$_entity, 'e');
        
        if (is_numeric($id)) {
            // TODO - Verificar antes se existe o id!
            $qb->where('e.id = ' . $id);   
        } else {
            $qb->where('e.id = 0');
        }

        return self::$em->createQuery($qb)->getArrayResult()[0];
    }

    public function save ($data)
    {
        $objectEntity = new static::$_entity();
        $objectEntity = self::$hydrator->hydrate($data, $objectEntity);
        
        try {
            self::$em->persist($objectEntity);
            self::$em->flush();
        } catch(\Doctrine\DBAL\DBALException $e) {
            return $e->getMessage();
        }

        return $objectEntity;
    }

    public function update ($id, $data)
    {
        $objectEntity = self::$em->find(static::$_entity, $id);
        $objectEntity = self::$hydrator->hydrate($data, $objectEntity);

        try {
            self::$em->persist($objectEntity);
            self::$em->flush();
        } catch (\Doctrine\ORM\ORMInvalidArgumentException $e) {
            return $e->getMessage();
        }
        
        return $objectEntity;
    }

    public function delete ($id)
    {
        $objectEntity = self::$em->find(static::$_entity, $id);

        try {
            self::$em->remove($objectEntity);
            self::$em->flush();
        } catch (\Doctrine\ORM\ORMInvalidArgumentException $e) {
            return $e->getMessage();
        }

        return $objectEntity;
    }
}