<?php

$path = $_SERVER['DOCUMENT_ROOT']."/CEStable/includes/autoLoader.inc.php";
include $path;
require($_SERVER['DOCUMENT_ROOT']."/CEStable/includes/importLibraries.inc.php");
?>

    <link rel="stylesheet" href="/CEStable/resources/css/main.css">

    <title>Components details</title>
  </head>
  <body>


<?php
  require('../../../includes/template/header.php');
?>


<?php print_r($_COOKIE); ?>

<?php
//echo "projectName: ".$_GET['projectName'];
//echo "<br>id: ".$_GET['componentID'];
//echo "<br>componentName: ".$_GET['componentName'];
$component = new Components();
$component_detail = $component->checkComponent($_GET['projectName'], $_GET['componentID']);

//echo '<pre>$component_detail: '; print_r($component_detail); echo '</pre>';

?>

<div class="container">
  <div class="wrapper m-md-2 p-md-5">
    <h2 class="text-success">Project Name: <?php echo $_COOKIE['projectName']; ?></h1>
<h3 class="pb-2 border-bottom text-end"><?php echo "component name: ".$_GET['componentName'];  ?> </h3>
    <div class="container py-5" id="hanging-icons">

      <!--need to pass $_COOKIE['material']+$items-->
          <?php
          if (!isset($_GET['projectName']) || !isset($_GET['componentID'])) {
              header('Location: ' . $_SERVER['HTTP_REFERER']);
          }
          ?>

          <!--<?php //foreach ($component_detail as $small_item => $value): ?>
          <div class="wrapper">
            <h3><?php //echo $small_item; ?></h3>
            <hr>
            <?php //foreach ($value as $small_item_name => $small_item_data): ?>
              <div class="row md-6">
                  <div class="col">
                      <?php //echo $small_item_name?>
                  </div>
                  <div class="col">
                      <?php //echo $small_item_data?>
                  </div>
                  <hr>
              </div>
            <?php //endforeach; ?>
          </div>
          <?php //endforeach; ?>

          <br><br><br>-->

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
                            <td><?php echo nl2br(htmlspecialchars($small_item_data));?></td>
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

/*echo $_SERVER['DOCUMENT_ROOT'];*/

//header('Location:../../showComponents.php');
