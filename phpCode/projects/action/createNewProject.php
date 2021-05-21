<?php

  //include classes
  $path = $_SERVER['DOCUMENT_ROOT']."/CEStable/includes/autoLoader.inc.php";
  include $path;
  //require($_SERVER['DOCUMENT_ROOT']."/CEStable/includes/importLibraries.inc.php");

    if(isset($_POST['saveNewProject'])) {
        $projectName = $_POST['projectName'];
        //check if db already exist
        $pdo = new Dbh();
        $sql = "SELECT COUNT(*) FROM INFORMATION_SCHEMA.SCHEMATA WHERE SCHEMA_NAME = '" . $projectName . "'";
        $stmt = $pdo->serverConnect()->query($sql);
        echo "stmt: ";
        var_dump($stmt);
        if ($stmt->fetchColumn()){
          //header("Location:../../index.php");
          echo "<script>alert('database already exists!!')</script>";
          echo "<script>window.location.href = '../../index.php'</script>";
          exit();
        }else {
            //開database:caseName+紀錄在central
            $project = new Project();
            $project->newProject($projectName);
            //真的去開db:caseName之下的tables
            $funObj = new Initial($projectName);
            //var_dump($funObj);
            echo "<script>alert('create successfully!!')</script>";
            echo "<script>window.location.href = '../../index.php'</script>";
            exit();
        }

    }else {
      echo "no button";
    }
