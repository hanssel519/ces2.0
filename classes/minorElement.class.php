<?php

/**
 *
 */
class MinorElement extends Dbh
{

    function __construct()
    {
        // code...
    }
    public function queryShow($projectName, $variable=''){
        //parameter is a array
        if(! $this->serverConnect() ){
            die('Could not connect: ' . mysql_error());
        }else {
            $total = array();
            foreach ($variable as $value) {
                //equals to table name
                $tmp = array();
                $sql = "SHOW COLUMNS FROM ".$value.";";
                $stmt = $this->connect($projectName)->query($sql);
                $row = $stmt->fetch();//ignore id
                while ($row = $stmt->fetch()){//THEOMETRICALLY only one match
                    $tmp[$row['Field']] = "單位-todo_list";
                }
                $total[$value] = $tmp;
            }
            return $total;
        }
    }
}
