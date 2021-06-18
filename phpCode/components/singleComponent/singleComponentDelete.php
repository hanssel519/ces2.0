<?php

$path = $_SERVER['DOCUMENT_ROOT']."/CEStable/includes/autoLoader.inc.php";
include $path;
require($_SERVER['DOCUMENT_ROOT']."/CEStable/includes/importLibraries.inc.php");
?>

    <link rel="stylesheet" href="/CEStable/resources/css/main.css">

    <title>Components delete</title>
  </head>


  <body>


<?php
  require('../../../includes/template/header.php');
?>

<?php
var_dump($_GET);
echo "<br>";
var_dump($_POST);
echo "<br>";
var_dump($_COOKIE);
if (!isset($_COOKIE['projectName'])) {
    header("Location: ../../index.php");
}elseif (!isset($_GET['componentID'])||!isset($_GET['componentName'])||!isset($_GET['action'])) {
    header("Location: ../showComponents.php");
}elseif (empty($_GET['componentID'])||empty($_GET['componentName'])||empty($_GET['action'])) {
    header("Location: ../showComponents.php");
}
?>

<?php
$component = new Components();
$component_detail = $component->checkComponent($_GET['projectName'], $_GET['componentID']);

?>


<div class="container">
  <div class="wrapper m-md-2 p-md-5">
      <div class="container">
          <div class="row">
              <div class="col-8">
                  <h2 class="text-success">Project Name: <?php echo $_COOKIE['projectName'];?></h2>
              </div>
              <div class="col-4">
                  <a href="../showComponents.php" class="btn btn-outline-success float-end">返回show components</a>
              </div>
          </div>
      </div>


      <div class="container py-5" id="hanging-icons">
      	<form method="post">
      	  <a style="float:right" name = "deletebtn" class="btn btn-danger" href="singleComponentDelete2.php?projectName=<?php echo $_GET['projectName'];?>&componentID=<?php echo $_GET['componentID'];?>&componentName=<?php echo $_GET['componentName']; ?>&action=delete" value = "Delete">確定刪除請按這</a>
          <h2 class="pb-2 border-bottom">  確定要刪除 <?php echo $_GET['componentName']; ?> ?</h2>
		</form>


        <div class="container py-3" id="hanging-icons">

        <?php foreach ($component_detail as $small_item => $value): ?>
            <h3><?php echo $small_item; ?></h3>
            <hr>
            <div class="table-responsive">
                <table class="table  table-hover">
                    <colgroup>
                       <col span="1" style="width: 40%;">
                       <col span="1" style="width: 60%;">
                    </colgroup>

                    <tbody>
                        <?php foreach ($value as $small_item_name => $small_item_data): ?>
                        <tr>
                            <td><?php echo $small_item_name?></td>
                            <td><?php echo $small_item_data?></td>
                        </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
            <?php endforeach; ?>

    </div>

  </div>
</div>


<?php
  include_once('../../../includes/template/footer.html');
?>


<!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="/CEStable/library/bootstrap-5.0.0-beta3/dist/js/bootstrap.bundle.min.js" integrity="sha384-JEW9xMcG8R+pH31jmWH6WWP0WintQrMb4s7ZOdauHnUtxwoG2vI5DkLtS3qm9Ekf" crossorigin="anonymous"></script>
    <script src="/CEStable/library/jquery/jquery-3.6.0.js"></script>


  </body>
</html>
