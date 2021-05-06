<?php
/**
 *
 */
class Project extends Dbh
{

    function __construct()
    {
        // code...
    }
    public function newProject($projectName){
        $sql = "CREATE DATABASE `" . $projectName."`";
        $stmt = $this->serverConnect()->query($sql);
        //加入db: CEScentral, table: cases
        $sql = "INSERT INTO `cases` (`name`) VALUES ('" . $projectName."');";
        $stmt = $this->connect('ces_central')->query($sql);
    }
    public function showAllProjects($value=''){
        $sql = "SELECT `name` FROM `cases`";
        $stmt = $this->connect('ces_central')->query($sql);
        $row = $stmt->fetchAll();
        return $row;
    }
}
