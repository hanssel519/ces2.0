<?php
/**
 *
 */
class Root extends Dbh
{

    function __construct(){
        //code
    }

    public function showAllRoots($projectName=''){
        $sql = 'SELECT name FROM root';
        $stmt = $this->connect($projectName)->query($sql);

        //equals to table name
        $tmp = array();
        $total = array();
        while ($row = $stmt->fetch()){//THEOMETRICALLY only one match
            $tmp['id'] = $row['id'];
            $tmp['name'] = $row['name'];
            $tmp['submission_date'] = $row['submission_date'];
            array_push($total, $tmp);
            //echo $row['name']." ". $row['material']." ".$row['remark']." ".$row['submission_date']."<hr>";
        }
        return $total;
    }
    //add root
    public function addRoot($projectName='', $rootName){
        $sql = "INSERT INTO `root` (name) VALUES (". $rootName .");";
        $stmt = $this->connect($projectName)->query($sql);
        return $stmt;
    }

}
