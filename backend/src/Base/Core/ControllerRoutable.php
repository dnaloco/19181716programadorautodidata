<?php 
namespace Base\Core;

use Respect\Rest\Routable;
use Base\Helpers\DataTypeHelper as data;

abstract class ControllerRoutable implements Routable
{
  protected static $model;

  abstract public function __construct ($em);
  
  public function get ($id = NULL)
  {
      if (NULL === $id) {
          $entities = static::$model->getEntities();       
      } else {
          $entities = static::$model->getEntity($id);
      }

      return $entities;
  }

  public function post ()
  {
      $post = data::getInput();
      $entity = static::$model->save($post);
      return $entity;
  }

  public function put ($id)
  {
      $put = data::getInput();
      $entity = static::$model->update((int)$id, $put);
      return $entity;
  }

  public function delete ($id)
  {
      $entity = static::$model->delete((int)$id);
      return $entity;
  }
}