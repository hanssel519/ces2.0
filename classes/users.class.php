<?php
/**
 *
 */
class Users extends Dbh
{
    private $name;
    private $auth_name;
    private $department;
    private $dbName = 'users';
    function __construct($auth_name){
        $this->auth_name = $auth_name;
        if (!strrpos($this->auth_name, '\\')) {
            $this->name = $this->auth_name;
        }else {
            $this->name = substr($auth_name, strrpos($auth_name, '\\') + 1);
        }
    }
    public function showAllUsers(){
        if(!$this->connect($this->dbName)){
            die('Could not connect: ' . mysql_error());
        }else {
            $sql = "SELECT * FROM `users`; ";
            $stmt = $this->connect($this->dbName)->query($sql);
            while ($row = $stmt->fetch()){
              echo $row['name']."-".$row['auth_user']."-".$row['department'].'<br>';
            }
        }

    }
    public function getUserName(){
        if (!strrpos($this->auth_name, '\\')) {
            $this->name = $this->auth_name;
            return $this->name;
        }
        $this->name = substr($this->auth_name, strrpos($this->auth_name, '\\') + 1) ;
        return $this->name;
    }
    public function getUsersDepartment(){
        if(!$this->connect($this->dbName)){
            die('Could not connect: ' . mysql_error());
        }else {
            $sql = "SELECT * FROM `users` WHERE name='".$this->name."'; ";
            $stmt = $this->connect($this->dbName)->query($sql);
            while ($row = $stmt->fetch()){//THEOMETRICALLY only one match
              return $row['department'];
            }
        }
    }
}
