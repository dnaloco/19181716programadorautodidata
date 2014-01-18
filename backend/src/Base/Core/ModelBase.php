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

    public function getEntities ($order = NULL, $limit = NULL, $offset = NULL)
    {
        $qb = self::$em->createQueryBuilder();
        $qb->select('e')
            ->from(static::$_entity, 'e');

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
        $entity = new static::$_entity();
        $entity = self::$hydrator->hydrate($data, $entity);
        self::$em->persist($entity);
        self::$em->flush();
    }

    public function update ($id, $data)
    {
        $entity = self::$em->find(static::$_entity, $id);
        $entity = self::$hydrator->hydrate($data, $entity);
        self::$em->persist($entity);
        self::$em->flush();
    }

    public function delete ($id)
    {
        $entity = self::$em->find(static::$_entity, $id);
        self::$em->remove($entity);
        self::$em->flush();
    }
}