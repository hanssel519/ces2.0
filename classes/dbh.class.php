<!--
  class name = document name
  otherwise autoLoad can't specified
-->

<?php
class Dbh {
  private $host = "localhost";
  private $user = "root";
  private $pwd = "";
  private $dbName = "";
  public function serverConnect(){
    $dsn = 'mysql:host=' . $this->host;
    $pdo = new PDO($dsn, $this->user, $this->pwd);
    //OPTIONAL(pull out data mode)
    $pdo->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
    //FETCH_ASSOC: get array from db
    return $pdo;
  }
  protected function connect($dbargument=''){
    if (empty($dbargument)) {
      $dsn = 'mysql:host=' . $this->host;
    }else {
      $dsn = 'mysql:host=' . $this->host . ';dbname=' . $dbargument;
    }
    $pdo = new PDO($dsn, $this->user, $this->pwd);
    //OPTIONAL(pull out data mode)
    $pdo->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
    //FETCH_ASSOC: get array from db
    return $pdo;
    //class extends to the Dbh class
    //then refer to the connect()
  }
}
