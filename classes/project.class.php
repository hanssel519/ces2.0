<?php
//include classes

class Project extends Dbh
{

    function __construct()
    {
        // code...
    }
    public function checkIfProExist($projectName){
        $sql = "SELECT * from `cases` WHERE name= :name;";
        echo $sql.'<hr>';
        $sth = $this->connect('ces_central')->prepare($sql);
        if (!$sth) {
            echo "\nPDO::errorInfo():\n";
            print_r($this->connect('ces_central')->errorInfo());
        }
        echo "exec: ". $sth->execute(array(':name' => $projectName));

        print_r($sth->fetchAll());

        if ($sth->execute(array(':name' => $projectName))) {
            if($sth->fetchAll()){
                echo $projectName." fetch!!<hr>";
                return true;
            }else {
                echo $projectName." not fetch!!<hr>";
                return false;
            }
        } else {
            echo '<div class="message message-warning">
            <h3>error</h3>
            <p>'.$sql.'</p>
            </div>';
        }
    }
    public function newProject($projectName){
        $sql = "CREATE DATABASE `".$projectName."`;";
        $stmt = $this->connect()->query($sql);
        //加入db: CEScentral, table: cases
        $sql = "INSERT INTO `cases` (`name`) VALUES ('".$projectName."');";
        $stmt = $this->connect('ces_central')->query($sql);
    }
    //在front page列出所有project
    public function showAllProjects($value=''){
        $sql = "SELECT * FROM `cases`";
        $stmt = $this->connect('ces_central')->query($sql);
        $row = $stmt->fetchAll();
        return $row;
    }
    public function copyProject($newProjectName, $oldProjectId, $oldProjectName){
        $sql = "CREATE DATABASE `".$newProjectName."`;";
        $data0 = $this->connect()->query($sql);

        $sql = "INSERT INTO `cases` (name) VALUES ('".$newProjectName."');";
        $data = $this->connect('ces_central')->query($sql);

        $sql = 'mysqldump --user=root "'.$oldProjectName.'" > '.$_SERVER['DOCUMENT_ROOT'].'/CEStable/sql/'.$oldProjectName.'.sql';
        echo '<pre>'; print_r($sql); echo '</pre>';
        $res =exec($sql);

        $obj = new pdoSqlApi();
        $res = $obj->importSQL($_SERVER['DOCUMENT_ROOT'].'/CEStable/sql/'.$oldProjectName.'.sql', $newProjectName);

    }
    public function deleteProject($projectId, $projectName){
        $sql = "DELETE FROM `cases` WHERE id = $projectId;";
        $stmt = $this->connect('ces_central')->query($sql);
        if ($stmt) {
            echo "deletion secceed<br>";
            $sql = "DROP DATABASE  `".$projectName."`;";
            echo $sql."<br>";
            $stmt = $this->connect('ces_central')->query($sql);
            if ($stmt) {
                echo "drop secceed<br>";
            }else {
                echo "drop failed<br>";
            }
        }else {
            echo "deletion failed<br>";
        }

    }
}
