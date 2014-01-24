<?php 
namespace Base\Core;

use Respect\Rest\Routable;
use Base\Helpers\DataTypeHelper as data;

abstract class ControllerRoutable implements Routable
{
  protected static $model;

  abstract public function __construct ($em)
  
  public function get ($id = NULL)
  {
      if (NULL === $id) {
          $entities = static::$model->getEntities();        
      } else {
          $entities = static::$model->getEntity($id)[0];
      }

      return $entities;
  }

  public function post ()
  {
      $post = data::getInput();
      $objectEntity = static::$model->save($post);
  }

  public function put ($id)
  {
      $put = data::getInput();
      $objectEntity = static::$model->update((int)$id, $put);
  }

  public function delete ($id)
  {
      $objectEntity = static::$model->delete((int)$id);
  }
}