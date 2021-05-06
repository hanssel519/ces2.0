<?php
spl_autoload_register('myAutoLoader');
function myAutoLoader($className)
{
  $path = $_SERVER['DOCUMENT_ROOT']."/CEStable/classes/";
  $extension = ".class.php";
  $fullPath = $path . $className . $extension;
  //to make the error message cleaner
  if (!file_exists($fullPath)) {
    return false;
  }
  include_once $fullPath;
}
