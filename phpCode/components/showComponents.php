<?php
  //include classes
  $path = $_SERVER['DOCUMENT_ROOT']."/CEStable/includes/autoLoader.inc.php";
  include $path;
  require($_SERVER['DOCUMENT_ROOT']."/CEStable/includes/importLibraries.inc.php");

?>

    <link rel="stylesheet" href="/CEStable/resources/css/main.css">

    <title>Show Components</title>
  </head>
  <body>


<?php
  require('../../includes/template/header.php');
?>


<?php print_r($_COOKIE); ?>
<!--body contents go here-->
<div class="container">
  <div class="wrapper m-md-2 pt-md-3">

    <h2 class="text-success">Project Name: <?php echo $_COOKIE['projectName'];?></h1>
    <div class="container pt-2">
        <!-- Button trigger modal -->
        <a type="button" class="btn btn-outline-secondary" href="componentsMainPage.php">Continue create components</a>
        <a id="newProjectBtn" type="button" href="componentsMainPage.php" class="btn btn-outline-success">decoration</a>
        <a type="button" class="btn btn-outline-dark">decoration</a>
    </div>


    <div class="container py-4">
        <div class="container m-md-2 pt-md-3">
            <h4 class="pb-2 border-bottom">show components</h4>
            <div class="list-group list-group-flush">
                <div class="list-group-item">
                    <div class="row align-items-center">
                        <div class="col">
                            name
                        </div>
                        <div class="col">
                            material
                        </div>
                        <div class="col">
                            submission_date
                        </div>
                    </div>
                </div>
              <!--list all the components-->
              <?php
              $components = new Components();
              $items = $components->showAllComponents($_COOKIE['projectName']);
              //echo '<pre>'; print_r($items); echo '</pre>';

              foreach ($items as $key => $value) {
                  //foreach ($value as $column => $data) {
                      //$url = "projects/individualMainPage.php?projectName=".urlencode();
                      ?>
                  <a class="list-group-item list-group-item-action list-group-item-light">
                      <div class="row align-items-center">
                        <div class="col">
                            <?php echo $value['name'] ?>
                        </div>
                        <div class="col">
                            <?php echo $value['material'] ?>
                        </div>
                        <div class="col">
                            <?php echo $value['submission_date'] ?>
                        </div>
                    </div>
                </a>
                      <?php
                  //}
              }
              ?>

            </div>
        </div>
    </div>


  </div>
</div>

<?php
  include_once('../../includes/template/footer.html');
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
