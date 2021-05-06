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
  <div class="container">
    <div class="wrapper m-md-2 p-md-5">
      <h2 class="text-success">Project Name: <?php echo $_COOKIE['projectName']; ?></h1>

      <div class="container py-5" id="hanging-icons">
        <h2 class="pb-2 border-bottom">Fill the Blanks</h2>

        <form>
            <?php
            if (!isset($_GET['selection'])) {
                header('Location: ' . $_SERVER['HTTP_REFERER']);
            }
            $selections = $_GET['selection'];
            //$selections an array with all the selection from previous page
            $minorElement = new MinorElement();
            $items = $minorElement->queryShow($_COOKIE['projectName'], $selections);

            /*echo '<pre>'; print_r($items); echo '</pre>';
            $keys = array_keys($items);
            echo '<pre>'; print_r($keys); echo '</pre>';*/
            ?>

          <?php foreach ($items as $item => $detail): ?>
          <div class="wrapper">
            <h3><?php echo $item; ?></h3>
            <?php foreach ($detail as $key => $value): ?>
              <div class="mb-4">
                <label for="exampleInput" class="form-label"><?php ECHO $key." (".$value.")" ?></label>
                <input type="text" class="form-control" id="exampleInput">
              </div>
            <?php endforeach; ?>
          </div>
          <?php endforeach; ?>



          <br>
          <button type="submit" class="btn btn-success">Submit</button>
        </form>



          <?php
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
