<?php 
namespace Base\Helpers;

final class DataTypeHelper extends NotInstantiable
{
  static public function isJson($string)
  {
    return ((is_string($string) && 
            (is_object(json_decode($string)) || 
            is_array(json_decode($string))))) ? true : false;
  }

  static public function getInput()
  {
    $frmInput = array();
    $input = file_get_contents('php://input');
    if(self::isJson($input)) {
        $frmInput = json_decode($input, true);
    } else {
        parse_str($input, $frmInput);
    }
    return $frmInput;
  }
}