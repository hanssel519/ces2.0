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
  require('../../../../includes/template/header.php');
?>
<!--body contents go here-->
<?php print_r($_COOKIE);
/*
selection(
    [0] => 塑膠
    [1] => 衝壓
)
info(
    [projectName] => 3
    [componentID] => 2
    [componentName] => al1
    [material] => AL
)
small_item_include(
    [塑膠] => 1
    [鋁] => 0
    [鋁擠] => 0
    [髮絲] => 0
)
*/

?>

<?php print_r($_POST); ?>

<?php
/*echo '<pre>'; print_r($_POST['info']); echo '</pre>';
foreach ($_POST as $key => $value) {
    echo '<pre>'; print_r($key); echo '</pre>';
    echo '<pre>'; print_r($value); echo '</pre>';
}*/
?>
  <div class="container">
    <div class="wrapper m-md-2 p-md-5">
      <h2 class="text-success">Project Name: <?php echo $_POST['info']['projectName']; ?></h1>

      <div class="container py-5" id="hanging-icons">
        <h2 class="pb-2 border-bottom">Fill the Blanks (<?php echo $_POST['info']['material']; ?>)</h2>
        <!--need to pass $_COOKIE['material']+$items-->


        <form action="modifyUpdateDB.php" method="POST">
            <?php
            if (!isset($_POST['selection'])) {
                header('Location: ' . $_SERVER['HTTP_REFERER']);
            }
            $selections = $_POST['selection'];
            //$selections an array with all the selection from previous page
            $minorElement = new MinorElement();
            $items = $minorElement->queryShow($_POST['info']['projectName'], $selections);
            /*
            Array
        (
            [塑膠] => Array
                (
                    [塑料名稱1] =>
                    [重量1] => (克(含料頭))
                    [塑料名稱2] =>
                )

            [衝壓] => Array
                (
                    [衝壓工程種類] => (參照設計)
                    [衝壓機台廠牌] =>
                    [衝壓機台型號或噸數] =>
                )
        )
            */
            //echo '<pre>'; print_r($items); echo '</pre>';
            /*
            $keys = array_keys($items);
            echo '<pre>'; print_r($keys); echo '</pre>';*/
            ?>
            <div class="mb-4">
            <?php
            $name = $minorElement->placeholder($_POST['info']['projectName'], 'components', $_POST['info']['componentID'], 'name');
            ?>
            <h3><label for="component_name" class="form-label">component名稱</label></h3>
            <input type="text" class="form-control" id="component_name" name = "component_name" value=<?php echo $name;?>>

            <?php
            $layer = $minorElement->placeholder($_POST['info']['projectName'], 'components', $_POST['info']['componentID'], 'layer');
            ?>
            <h3><label for="layer" class="form-label">layer</label></h3>
            <input type="text" class="form-control" id="layer" name = "layer" value=<?php echo $layer;?>>

            <?php
            $supplier = $minorElement->placeholder($_POST['info']['projectName'], 'components', $_POST['info']['componentID'], 'supplier');
            ?>
            <h3><label for="supplier" class="form-label">供應商</label></h3>
            <input type="text" class="form-control" id="supplier" name = "supplier" value=<?php echo $supplier;?>>
            <?php
            $amount = $minorElement->placeholder($_POST['info']['projectName'], 'components', $_POST['info']['componentID'], 'amount');
            ?>

            <h3><label for="amount" class="form-label">數量</label></h3>
            <input type="text" class="form-control" id="amount" name = "amount" value=<?php echo $amount;?>>

            </div>

          <?php foreach ($items as $small_item => $detail): ?>
          <div class="wrapper">
            <h3><?php echo $small_item; ?></h3>
            <?php foreach ($detail as $key => $value): ?>
                <?php if (strcmp($key, 'submission_date')): ?>
                    <?php

                    $small_item_id = $minorElement->getID($_POST['info']['projectName'], $_POST['info']['componentID'], $small_item);
                    if ($small_item_id) {
                        $default_value = $minorElement->placeholder($_POST['info']['projectName'], $small_item, $small_item_id, $key);
                    }else {
                        $default_value = "";
                    }

                    ?>
                    <div class="mb-4">
                      <label for=<?php echo $key; ?> class="form-label"><?php ECHO $key.$value ?></label>
                      <input type="text" class="form-control" id=<?php echo $key; ?> name = <?php echo $key; ?> value=<?php echo $default_value; ?>>
                    </div>
                <?php endif; ?>

            <?php endforeach; ?>
          </div>
          <?php endforeach; ?>

          <?php
          $remark = $minorElement->placeholder($_POST['info']['projectName'], 'components', $_POST['info']['componentID'], 'remark');
          ?>
          <div class="mb-4">
          <h3><label for="remark" class="form-label">備註</label></h3>
          <input type="text" class="form-control" id="remark" name = "remark" value = <?php echo $remark;?>>
          </div>

          <!--pass $items with hidden-->
          <?php echo '<pre>'; print_r($items); echo '</pre>'; ?>

          <input type='hidden' name='items' value="<?php echo htmlentities(serialize($items)); ?>" />
          <input type='hidden' name='selections' value="<?php echo htmlentities(serialize($selections)); ?>" />
          <?php $small_item_for_your_department = unserialize($_POST['small_item_for_your_department']); ?>
          <input type='hidden' name='small_item_for_your_department' value="<?php echo htmlentities(serialize($small_item_for_your_department)); ?>" />
          <!--for modify的 delete舊資料-->
          <input type='hidden' name='componentID' value="<?php echo $_POST['info']['componentID']; ?>" />

          <?php
          echo '<pre>'; print_r($_POST['info']); echo '</pre>';
          foreach($_POST['info'] as $key => $value){
              echo '<input type="hidden" name="info['.$key.']" value="'. $value. '">';
          }
          ?>


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
  include_once('../../../../includes/template/footer.html');
?>


  <!-- Option 1: Bootstrap Bundle with Popper -->
  <script src="/CEStable/library/bootstrap-5.0.0-beta3/dist/js/bootstrap.bundle.min.js" integrity="sha384-JEW9xMcG8R+pH31jmWH6WWP0WintQrMb4s7ZOdauHnUtxwoG2vI5DkLtS3qm9Ekf" crossorigin="anonymous"></script>
  <script type="text/javascript">

  </script>

  </body>
</html>
