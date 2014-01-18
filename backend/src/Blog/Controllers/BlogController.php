<?php 
namespace Blog\Controllers;

use Base\Core\ControllerRoutable;
use Blog\Models\PostModel;

final class BlogController extends ControllerRoutable
{
    protected static $model;

    public function __construct($em)
    {
        self::$model = new PostModel($em);
    }
}