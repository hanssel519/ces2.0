<?php
/**
 *
 */
class Branch extends Dbh
{

    function __construct()
    {
        // code...
    }
    //在front page列出所有project names
    public function showAllBranches($projectName=''){
        $sql = 'SELECT name FROM branch';
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
    //add branch
    public function addBranch($projectName='', $items, $branchName){
        $sql = "INSERT INTO `branch` (name) VALUES (". $branchName .");";
        $stmt = $this->connect($projectName)->query($sql);

    }
    public function checkBranch($projectName=''){

    }
    public function copyBranch($projectName=''){

    }
    public function deleteBranch($projectName=''){

    }
}
