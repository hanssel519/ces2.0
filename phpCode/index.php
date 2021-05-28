<?php
  //include classes
  $path = $_SERVER['DOCUMENT_ROOT']."/CEStable/includes/autoLoader.inc.php";
  include $path;
  require($_SERVER['DOCUMENT_ROOT']."/CEStable/includes/importLibraries.inc.php");
  $path = $_SERVER['DOCUMENT_ROOT']."/CEStable/library/phpDebug/ChromePhp.php";
  include $path;
?>
<!--
<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <script src="/CEStable/library/jquery/jquery-3.6.0.js"></script>
    <link rel="stylesheet" href="/CEStable/library/bootstrap-5.0.0-beta3/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="/CEStable/library/fontawesome-free-5.15.3-web/fontawesome-free-5.15.3-web/css/all.css">
  -->
    <link rel="stylesheet" href="/CEStable/resources/css/main.css">


    <title>Home Page</title>
  </head>
  <body>

<script>
function projectNameErr() {
    swal({
      title: '名稱錯誤 誤加分號,單雙引號!',
      //text: '誤加分號,單雙引號',
      //timer: 3000,
      button: true,
      icon: 'error'
    });
}
</script>
<?php
  require('../includes/template/header.php');
?>
<?php
if (isset($_GET['err'])) {
    echo "<script>projectNameErr();</script>";
}
?>
<!--modal for component copy-->
<div class="modal fade" id="copyProject" tabindex="-1" aria-labelledby="copyProject" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="copyProject">Enter your project name</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>

          <form id="copy_form" action="projects/action/copyProject.php" method="POST">
            <div class="modal-body">
              ...
              <p id="id_name"></p>
                <div class="mb-3">
                  <label for="inputName" class="form-label">project name</label>
                  <input type="text" class="form-control" name="projectName" id="inputName" placeholder="Enter your project name">
                </div>
              ...
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
              <button type="submit" name="saveNewProject" class="btn btn-primary">Submit</button>
            </div>
          </form>

        </div>
    </div>
</div>
<!-- Modal -->
<div class="modal fade" id="createProject" tabindex="-1" aria-labelledby="createProject" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="createProject">Enter your project name</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>

      <form action="projects/action/createNewProject.php" method="POST">
        <div class="modal-body">
          ...
            <div class="mb-3">
              <label for="inputName" class="form-label">project name</label>
              <input type="text" class="form-control" name="projectName" id="inputName">
            </div>
          ...
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
          <button type="submit" name="saveNewProject" class="btn btn-primary">Submit</button>
        </div>
      </form>

    </div>
  </div>
</div>

<?php print_r($_COOKIE); ?>
<!--body contents go here-->
<div class="container">
  <div class="wrapper m-md-2 pt-md-3">

    <div class="container">
      <!-- Button trigger modal -->
      <a type="button" class="btn btn-outline-secondary" data-bs-toggle="modal" data-bs-target="#createProject">Create Project</a>
      <a id="newProjectBtn" type="button" href="/CEStable/phpCode/projects/newProject.php" class="btn btn-outline-success">upload file</a>
      <a type="button" id="sweetalert" class="btn btn-outline-dark">Dark</a>
    </div>

<!--    <div class="container m-md-2 pt-md-3">
      <h1>list the projects you got now</h1>
      <span>if it's empty show no projects</span>
      <hr>
      <div class="list-group list-group-flush">

        <?php
        // $project = new Project();
        // $list = $project->showAllProjects();
        // foreach ($list as $key => $value) {
        //     foreach ($value as $key => $name) {
        //         $url = "projects/individualMainPage.php?projectName=".urlencode($name);
                ?>
                <a href=<?php //echo $url; ?> class="list-group-item list-group-item-action list-group-item-light"><?php //echo $name; ?></a>
                <?php
            //}
        //}
        ?>

      </div>

    </div>-->

    <div class="list-group list-group-flush">
        <div class="list-group-item">
            <div class="row align-items-center">
                <div class="col fs-4">
                    name
                </div>
                <div class="col fs-4">
                    submission_date
                </div>
                <div class="col fs-4">
                    Action
                </div>
            </div>
        </div>
          <!--list all the components-->
          <?php


          $project = new Project();
          $items = $project->showAllProjects();

          if (! $items) {//no components
              ?>
              <p class="pt-5 text-center">尚無資料</p>
              <?php
          }
          foreach ($items as $key => $value) {
            $url = "projects/individualMainPage.php?projectName=".urlencode($value['name']);
            ?>
            <div class="list-group-item list-group-item-action list-group-item-light">
                <div class="container">
                  <div class="row align-items-center">
                    <div class="col fs-4">
                        <?php echo $value['name'] ?>
                    </div>
                    <div class="col fs-4">
                        <?php echo $value['submission_date'] ?>
                    </div>
                    <div class="col fs-4">
                        <a type="button" href=<?php echo $url; ?> class="btn btn-secondary" name="button">查看</a>

                        <a type="button" href="projects/action/deleteProject.php?id=<?php echo $value['id'];?>&name=<?php echo $value['name'];?>" class="btn btn-secondary" name="button">刪除</a>

                        <a type="button" id="copy_btn" onclick="copy_onclick('<?php echo $value['id'];?>','<?php echo $value['name'];?>')" class="btn btn-secondary" name="button">複製</a>
                    </div>
                  </div>
                </div>
            </div>
                  <?php
              //}
          }
          ?>
    </div>


    <div class="m-md-5 pt-md-5 text-center">
      <div class="row align-items-center">
        <div class="col">
          <h2>One of three columns</h2>
          <?php
            $person1 = new Person("Daniel",29);
            echo $person1->getAD().'<br>';
            echo $person1->showName().'<BR>';
            echo $_SERVER['DOCUMENT_ROOT'];
          ?>

        </div>
        <div class="col">
          <h2>One of three columns</h2>
          <?php
          $users = new Users($_SERVER['PHP_AUTH_USER']);
          $users->showAllUsers();
          echo "<hr>";
          ?>
        </div>
        <div class="col">
          <h2>One of three columns</h2>
          <?php
          //$init = new Initial();
          echo "initial called";
          ?>
        </div>
      </div>
    </div>

  </div>
</div>

<?php
  include_once('../includes/template/footer.html');
?>
<!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="/CEStable/library/bootstrap-5.0.0-beta3/dist/js/bootstrap.bundle.min.js" integrity="sha384-JEW9xMcG8R+pH31jmWH6WWP0WintQrMb4s7ZOdauHnUtxwoG2vI5DkLtS3qm9Ekf" crossorigin="anonymous"></script>
    <script src="/CEStable/library/jquery/jquery-3.6.0.js"></script>

    <script type="text/javascript">
        document.getElementById("newProjectBtn").onclick = function () {
            location.href = "projects/newProject.php";
        };
        function copy_onclick(project_id, project_name) {
            document.getElementById('id_name').innerHTML = "copy from project name: "+project_name;
            var formAction = $('#copy_form').attr('action');
            var url = "?project_id="+project_id+"&project_name="+project_name;
            $('#copy_form').attr('action', formAction + url);
            $('#copyProject').modal('show');
        }
        document.getElementById("sweetalert").onclick = function () {
            swal({
              title: 'Auto close alert!',
              text: 'I will close in 2 seconds.',
              timer: 2000,
              button: true
            });
        };
        function confirmTest() {
            Swal.fire({
                title: "操作確認",
                text: "請點選你想按的按鈕",
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
  </body>
</html>


<!-- Option 1: Bootstrap Bundle with Popper -->
<!--<script src="library/bootstrap-5.0.0-beta3/dist/js/bootstrap.bundle.min.js" integrity="sha384-JEW9xMcG8R+pH31jmWH6WWP0WintQrMb4s7ZOdauHnUtxwoG2vI5DkLtS3qm9Ekf" crossorigin="anonymous"></script>

</body>
</html>-->
