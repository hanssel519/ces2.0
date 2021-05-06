<?php
/**
 *
 */
class Test extends Dbh{
  //有user input才需要prepare statement

  public function getUsers($value=''){
    $sql = "SELECT * FROM users";
    $stmt = $this->connect("users")->query($sql);
    while ($row = $stmt->fetch()){
      echo $row['name']." ".$row['email'].'<br>';
    }
  }
  public function getUsersStmt($name, $department){
    $sql = "SELECT * FROM users WHERE name = ? AND department = ?";
    $stmt = $this->connect("users")->prepare($sql);
    $stmt->execute([$name, $department]);
    $names = $stmt->fetchAll();
    foreach ($names as $name) {
      echo $name['name']." ".$name['email'].'<br>';
    }

  }
}
