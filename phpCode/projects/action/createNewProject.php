<?php

  //include classes
  $path = $_SERVER['DOCUMENT_ROOT']."/CEStable/includes/autoLoader.inc.php";
  include $path;

  ?>
  <script src="/CEStable/library/bootstrap-5.0.0-beta3/dist/js/bootstrap.bundle.min.js" integrity="sha384-JEW9xMcG8R+pH31jmWH6WWP0WintQrMb4s7ZOdauHnUtxwoG2vI5DkLtS3qm9Ekf" crossorigin="anonymous"></script>
  <script src="/CEStable/library/jquery/jquery-3.6.0.js"></script>
  <script src="/CEStable/library/sweetalert/sweetalert.min.js"></script>
  <!--<script src="/CEStable/library/sweetalert/sweetalert2.min.js"></script>
  <link rel="stylesheet" href="/CEStable/library/sweetalert/sweetalert2.min.css">-->

<script src="/CEStable/resources/js/alert.js"></script>
  <?php
  //require($_SERVER['DOCUMENT_ROOT']."/CEStable/includes/importLibraries.inc.php");

    if(isset($_POST['saveNewProject'])) {
        $projectName = trim($_POST['projectName']);
        //check if db already exist
        //$projectName = htmlentities($projectName, ENT_QUOTES, 'UTF-8');
        echo "<hr>分號: ". strpos($projectName,';');
        echo "<hr>單引: ". strpos($projectName,'\'');
        echo "<hr>雙引: ". strpos($projectName,'\"');
        if((strpos($projectName,';')!==false)||(strpos($projectName,'\'')!==false)||(strpos($projectName,'\"')!==false)){
            //sweetalert -- swal加在這邊會快速消失
            //所以送一個error flag回index.php
            echo "<script>window.location.href = '../../index.php?err=projectNameFormat'</script>";
            exit();
        }
        $obj = new Project();
        echo "proname: ". $projectName.'<br>';
        $ifExist = $obj->checkIfProExist($projectName);

        if ($ifExist){
          echo "<script>alert('database already exists!!')</script>";
          echo "<script>window.location.href = '../../index.php?err=projectNameExists'</script>";
          exit();
        }else {
            //開database:caseName+紀錄在central
            $project = new Project();
            $project->newProject($projectName);
            //真的去開db:caseName之下的tables
            //echo "projectName w/o json encode: ".$projectName.'<br>';
            //echo "projectName with quotation: ".$projectName.'<br>';
            $funObj = new Initial($projectName);

            echo "<script>window.location.href = '../../index.php?success=createProject'</script>";
            exit();
        }

    }else {
      echo "no button";
      echo "<script>window.location.href = '../../index.php'</script>";
    }

?>
<script>
/*document.getElementById("sweetalert").onclick = function () {
    swal("Here's the title!", "...and here's the text!");
};*/
var sayWelcomeIIFEs = function() {
    swal("Here's the title!", "...and here's the text!");
}();

function sayWelcomeIIFEskk() {
    swal("Here's the title!");
};
function confirmTest() {
    Swal.fire({
        title: "操作確認",
        text: "請點選你想按的按鈕",
        timer: 3000,
        showCancelButton: true
    }).then(function(result) {
       if (result.value) {
            Swal.fire("您按了OK");
       }
       else {
           Swal.fire("您選擇了Cancel");
       }
    });
}
</script>
