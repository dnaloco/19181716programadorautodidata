<?php 
namespace Base\Core;

use DoctrineModule\Stdlib\Hydrator\DoctrineObject as DoctrineHydrator;

abstract class ModelBase
{
    private static $em;
    private static $hydrator;
    private $filter;
    protected static $_entity;

    public function __construct ($em)
    {
        self::$em = $em;
        self::$hydrator = new DoctrineHydrator($em, static::$_entity);
    }

    public function getEntities (Array $options)
    {
        $qb = self::$em->createQueryBuilder();
        $qb->select('e')
            ->from(static::$_entity, 'e');

        if(array_key_exists('offset', $options)) {
            $qb->setFirstResult($options['offset']);
        }

        if(array_key_exists('limit', $options)) {
            $qb->setMaxResults($options['limit']);
        }
        
        if(array_key_exists('orderby', $options)) {
            $qb->orderBy('e' . '.' . $options['orderby']);
        }
        
        $entities = self::$em->createQuery($qb)->getArrayResult();

        return $entities;
    }

    public function getEntity ($id)
    {
        $qb = self::$em->createQueryBuilder();
        $qb->select('e')->from(static::$_entity, 'e');
        if (is_numeric($id)) {
            $qb->where('e.id = ' . $id);   
        } else {
            $qb->where('e.id = 0');
        }
        $entity = self::$em->createQuery($qb)->getArrayResult();
        return $entity;
    }

    public function save ($data)
    {
        $objectEntity = new static::$_entity();
        $objectEntity = self::$hydrator->hydrate($data, $objectEntity);
        self::$em->persist($objectEntity);
        self::$em->flush();
        return $objectEntity;
    }

    public function update ($id, $data)
    {
        $objectEntity = self::$em->find(static::$_entity, $id);
        $objectEntity = self::$hydrator->hydrate($data, $objectEntity);
        self::$em->persist($objectEntity);
        self::$em->flush();
        return $objectEntity;
    }

    public function delete ($id)
    {
        $objectEntity = self::$em->find(static::$_entity, $id);
        self::$em->remove($objectEntity);
        self::$em->flush();
        return $objectEntity;
    }
}