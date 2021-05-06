<?php
class Person {
  private $name;
  private $age;
  //static放所有instance都會用到的var
  public static $drinkingAge = 21;

  public function __construct($name, $age){
    $this->name = $name;
    $this->age = $age;
  }
  public function setName($name){
    $this->name = $name;
  }
  public function showName(){
    return $this->name;
  }
  public function __destruct(){
  }
  public function getAD(){
    return self::$drinkingAge;
  }
  public static function setNewDrinkingAge($newDA){
    self::$drinkingAge = $newDA;
  }
}
