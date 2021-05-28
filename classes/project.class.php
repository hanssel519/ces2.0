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
        //$sth = $this->connect()->prepare($sql);
        //echo '<pre>'; print_r($sth); echo '</pre>';
        //$r = $sth->execute(array($projectName));
        //echo '<pre>'; print_r($r); echo '</pre>';
        //加入db: CEScentral, table: cases
        $sql = "INSERT INTO `cases` (`name`) VALUES ('".$projectName."');";
        $stmt = $this->connect('ces_central')->query($sql);
        //$sth = $this->connect()->prepare($sql);
        //echo '<pre>'; print_r($sth); echo '</pre>';
        //$sth->execute(array(':name' => $projectName));
    }
    //在front page列出所有project
    public function showAllProjects($value=''){
        $sql = "SELECT * FROM `cases`";
        $stmt = $this->connect('ces_central')->query($sql);
        $row = $stmt->fetchAll();
        return $row;
    }
    public function copyProject($newProjectName, $oldProjectId, $oldProjectName){
        //$sql = "mysqldump --user=... --password=... --host=... DB_NAME > /path/to/output/file.sql;";
        //$sql ="exec('mysqldump --user=... --password=... --host=... DB_NAME > /path/to/output/file.sql');";
        $sql = "CREATE DATABASE `".$newProjectName."`;";
        $data0 = $this->connect()->query($sql);
        echo '<pre>'; print_r($sql); echo '</pre>';
        echo '<pre>'; print_r($data0); echo '</pre>';

        $sql = "INSERT INTO `cases` (name) VALUES ('".$newProjectName."');";
        echo '<pre>'; print_r($sql); echo '</pre>';
        $data = $this->connect('ces_central')->query($sql);
        echo '<pre>'; print_r($data); echo '</pre>';

        $sql = 'mysqldump --user=root "'.$oldProjectName.'" > '.$_SERVER['DOCUMENT_ROOT'].'/CEStable/sql/'.$oldProjectName.'.sql';
        echo '<pre>'; print_r($sql); echo '</pre>';
        $res =exec($sql);
        //echo '<pre>'; print_r($res); echo '</pre>';

        $obj = new pdoSqlApi();
        $res = $obj->importSQL($_SERVER['DOCUMENT_ROOT'].'/CEStable/sql/'.$oldProjectName.'.sql', $newProjectName);


        //$sql = 'mysqldump --user=root "'.$newProjectName.'" < '.$_SERVER['DOCUMENT_ROOT'].'/CEStable/sql/'.$oldProjectName.'.sql';
        //echo '<pre>'; print_r($sql); echo '</pre>';
        //$res =shell_exec($sql);
//echo $res;
                /*$dump_output = shell_exec("mysqldump --opt --default-character-set=UTF8 --single-transaction --protocol=TCP -u --user=root --password= --host=localhost ".$oldProjectName." > restoresync.sql");
                echo $dump_output;

                $restore_output = shell_exec("mysqldump --opt --default-character-set=UTF8 --single-transaction --protocol=TCP -u --user=root --password= --host=localhost ".$newProjectName." < restoresync.sql");
                echo $restore_output;*/



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
