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
<?php

echo 'GET<pre>'; print_r($_GET); echo '</pre>';
echo "<br>";
echo 'POST<pre>'; print_r($_POST); echo '</pre>';
echo "<br>";
echo 'COOKIE<pre>'; print_r($_COOKIE); echo '</pre>';
echo "<hr>";
/*echo "<br>";
echo '<pre>'; print_r(unserialize($_POST['small_item_for_your_department'])); echo '</pre>';
echo "<br>";
$small_item_for_your_department = unserialize($_POST['small_item_for_your_department']);

echo '$small_item_for_your_department: <pre>'; print_r(htmlentities(serialize($small_item_for_your_department))); echo '</pre>';*/

if (!isset($_COOKIE['projectName'])) {
    header("Location: ../../index.php");
}elseif (!isset($_POST['selection']) || !isset($_POST['info'])|| !isset($_POST['small_item_include'])|| !isset($_POST['small_item_for_your_department'])) {
    header("Location: ../../showComponents.php");
}
?>

  <div class="container">
    <div class="wrapper m-md-2 p-md-5">
        <div class="container">
            <div class="row">
                <div class="col-8">
                    <h2 class="text-success">Project Name: <?php echo $_COOKIE['projectName'];?></h2>
                </div>
                <div class="col-4">
                    <a href="../../showComponents.php" class="btn btn-outline-success float-end">返回show components</a>
                </div>
            </div>
        </div>

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
            $items =
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
            <textarea class="form-control" id="layer" name = "layer"> <?php echo $layer; ?> </textarea>

            <?php
            $supplier = $minorElement->placeholder($_POST['info']['projectName'], 'components', $_POST['info']['componentID'], 'supplier');
            ?>
            <h3><label for="supplier" class="form-label">供應商</label></h3>
            <textarea type="text" class="form-control" id="supplier" name = "supplier"> <?php echo $supplier; ?></textarea>
            <?php
            $amount = $minorElement->placeholder($_POST['info']['projectName'], 'components', $_POST['info']['componentID'], 'amount');
            ?>

            <h3><label for="amount" class="form-label">數量</label></h3>
            <textarea type="text" class="form-control" id="amount" name = "amount"> <?php echo $amount; ?></textarea>

            </div>

          <?php foreach ($items as $small_item => $detail): ?>
          <div class="wrapper">
            <h3><?php echo $small_item; ?></h3>
            <?php foreach ($detail as $key => $value): ?>
                <?php if (strcmp($key, 'submission_date')):
                    $small_item_id = $minorElement->getID($_POST['info']['projectName'], $_POST['info']['componentID'], $small_item);
                    if ($small_item_id) {
                        $default_value = $minorElement->placeholder($_POST['info']['projectName'], $small_item, $small_item_id, $key);
                    }else {
                        $default_value = "";
                    }

                    ?>
                    <div class="mb-4">
                      <label for=<?php echo $key; ?> class="form-label"><?php ECHO $key.$value ?></label>
                      <textarea type="text" class="form-control" id=<?php echo $key; ?> name = <?php echo $key; ?>> <?php echo $default_value; ?></textarea>
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
          <textarea type="text" class="form-control" id="remark" name = "remark"><?php echo $remark; ?></textarea>
          </div>

          <!--pass $items with hidden-->
          <?php echo '<pre>'; print_r($items); echo '</pre>'; ?>
        <!--
        $items
        (
            [塑膠] => Array
                (
                    [塑料名稱1] =>
                    [重量1] => (克(含料頭))
                    [塑料名稱2] =>
                    [重量2] => (克(含料頭))
                )

            [鋁] => Array
                (
                    [鋁長] => (下料尺寸mm)
                    [鋁寬] => (下料尺寸mm)
                    [鋁厚] => (下料尺寸mm)
                    [鋁金屬名稱] =>
                    [鋁比重] =>
                )

            [鋁擠] => Array
                (
                    [鋁擠工程種類] => (參照設計)
                    [鋁擠線種類] =>
                    [鋁擠線編號] =>
                    [鋁擠秒數] =>
                    [鋁擠良率] =>
                )
        )
        -->
          <input type='hidden' name='items' value="<?php echo htmlentities(serialize($items)); ?>" />
          <input type='hidden' name='selections' value="<?php echo htmlentities(serialize($selections)); ?>" />
          <?php $small_item_for_your_department = unserialize($_POST['small_item_for_your_department']); ?>
          <input type='hidden' name='small_item_for_your_department' value="<?php echo htmlentities($_POST['small_item_for_your_department']); ?>" />
          <!--htmlentities(serialize($small_item_for_your_department));-->
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
