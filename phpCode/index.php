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


<?php
  require('../includes/template/header.php');
?>

<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Enter your project name</h5>
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
      <a type="button" class="btn btn-outline-secondary" data-bs-toggle="modal" data-bs-target="#exampleModal">Create Project</a>
      <a id="newProjectBtn" type="button" href="/CEStable/phpCode/projects/newProject.php" class="btn btn-outline-success">upload file</a>
      <a type="button" class="btn btn-outline-dark">Dark</a>
    </div>

    <div class="container m-md-2 pt-md-3">
      <h1>list the projects you got now</h1>
      <span>if it's empty show no projects</span>
      <hr>
      <div class="list-group list-group-flush">

        <!--list all the projects-->
        <?php
        $project = new Project();
        $list = $project->showAllProjects();
        foreach ($list as $key => $value) {
            foreach ($value as $key => $name) {
                ?>
                <a href="projects/individualMainPage.php?projectName=<?php echo $name; ?>" class="list-group-item list-group-item-action list-group-item-light"><?php echo $name ?></a>
                <?php
            }
        }
        ?>

      </div>

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
          $users = new Users();
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
    </script>
  </body>
</html>


<!-- Option 1: Bootstrap Bundle with Popper -->
<!--<script src="library/bootstrap-5.0.0-beta3/dist/js/bootstrap.bundle.min.js" integrity="sha384-JEW9xMcG8R+pH31jmWH6WWP0WintQrMb4s7ZOdauHnUtxwoG2vI5DkLtS3qm9Ekf" crossorigin="anonymous"></script>

</body>
</html>-->
