<?php
  //include classes
  $path = $_SERVER['DOCUMENT_ROOT']."/CEStable/includes/autoLoader.inc.php";
  include $path;
  require($_SERVER['DOCUMENT_ROOT']."/CEStable/includes/importLibraries.inc.php");
?>

    <title>fillInput!</title>
  </head>
  <body>

<?php
  require('../../includes/template/header.php');
?>
<!--body contents go here-->
<?php

var_dump($_GET);
echo "<br>";
var_dump($_POST);
echo "<br>";
var_dump($_COOKIE);
if (!isset($_COOKIE['projectName'])) {
    header("Location: ../index.php");
}elseif (!isset($_COOKIE['material'])) {
    header("Location: componentsMainPage.php");
}
?>
  <div class="container">
    <div class="wrapper m-md-2 p-md-5">
        <div class="row">
            <div class="col-8">
                <h2 class="text-success">Project Name: <?php echo $_COOKIE['projectName'];?></h2>
            </div>
            <div class="col-4">
                <a href="../projects/individualMainPage.php?projectName=<?php echo $_COOKIE['projectName']; ?>" class="btn btn-outline-success float-end">返回當前project首頁</a>
            </div>
        </div>

      <div class="container py-5" id="hanging-icons">
        <h2 class="pb-2 border-bottom">Fill the Blanks (<?php echo $_COOKIE['material']; ?>)</h2>
        <!--need to pass $_COOKIE['material']+$items-->
        <form class="form-validation" action="action/fillInputAction.php" method="POST">
            <?php
            if (!isset($_POST['selection'])) {
                header('Location: ' . $_SERVER['HTTP_REFERER']);
            }
            $selections = $_POST['selection'];
            //$selections an array with all the selection from previous page
            $minorElement = new MinorElement();
            $items = $minorElement->queryShow($_COOKIE['projectName'], $selections);

            echo '<pre>'; print_r($items); echo '</pre>';
            /*
            $keys = array_keys($items);
            echo '<pre>'; print_r($keys); echo '</pre>';*/
            ?>
            <div class="mb-4">
            <h3><label for="component_name" class="form-label ">component名稱</label></h3>
            <input type="text" class="form-control mb-4" id="component_name" name = "component_name" autocomplete="off" required placeholder='This input is required (必填)'>
            <h3><label for="layer" class="form-label">layer</label></h3>
            <textarea type="text" class="form-control mb-4" id="layer" name = "layer"></textarea>

            <h3><label for="supplier" class="form-label">供應商</label></h3>
            <textarea type="text" class="form-control mb-4" id="supplier" name = "supplier"></textarea>
            <h3><label for="amount" class="form-label">數量</label></h3>
            <textarea type="text" class="form-control" id="amount" name = "amount"></textarea>
            </div>

          <?php foreach ($items as $item => $detail): ?>
          <div class="wrapper">
            <h3><?php echo $item; ?></h3>
            <?php foreach ($detail as $key => $value): ?>
                <?php if (strcmp($key, 'submission_date')): ?>
                    <div class="mb-4">
                      <label for=<?php echo $key; ?> class="form-label"><?php ECHO $key.$value ?></label>
                      <textarea type="text" class="form-control mb-4" id=<?php echo $key; ?> name = <?php echo $key; ?>></textarea>
                    </div>
                <?php endif; ?>

            <?php endforeach; ?>
          </div>
          <?php endforeach; ?>

          <div class="mb-4">
          <h3><label for="remark" class="form-label">備註</label></h3>
          <textarea type="text" class="form-control" id="remark" name = "remark"></textarea>
          </div>

          <!--pass $items with hidden-->
          <input type='hidden' name='items' value="<?php echo htmlentities(serialize($items)); ?>" />




          <br>
          <button type="submit" class="btn btn-success">Submit</button>
        </form>



          <?php
          //return item template
            $items = array(
              '塑膠' => array(
                '塑料名稱' => '單位',
                '重量 克(含料頭)' => '公克',
              ),
              'Nut' => array(
                '型號' => 'xx',
                '品牌' => 'xx',
                '用量pc' => 'xx',
              )
            );
          ?>


      </div>

    </div>
  </div>



<?php
  include_once('../../includes/template/footer.html');
?>


  <!-- Option 1: Bootstrap Bundle with Popper -->
  <script src="/CEStable/library/bootstrap-5.0.0-beta3/dist/js/bootstrap.bundle.min.js" integrity="sha384-JEW9xMcG8R+pH31jmWH6WWP0WintQrMb4s7ZOdauHnUtxwoG2vI5DkLtS3qm9Ekf" crossorigin="anonymous"></script>
  <script type="text/javascript">

  </script>

  </body>
</html>
