<?php
  //include classes
  $path = $_SERVER['DOCUMENT_ROOT']."/CEStable/includes/autoLoader.inc.php";
  include $path;
  require($_SERVER['DOCUMENT_ROOT']."/CEStable/includes/importLibraries.inc.php");
?>

    <link rel="stylesheet" href="/CEStable/resources/css/rootMake.css">
    <title>fillInput!</title>
  </head>
  <body>

<?php
  require('../../../includes/template/header.php');
?>
<!--body contents go here-->
<?php print_r($_COOKIE); ?>
  <div class="container">
    <div class="wrapper m-md-2 p-md-5">
      <h2 class="text-success">Project Name: <?php echo $_COOKIE['projectName']; ?></h1>

      <div class="container py-5" id="hanging-icons">
        <h2 class="pb-2 border-bottom">Fill the Blanks (Assembly)</h2>
        <!--need to pass $_COOKIE['material']+$items-->
        <form id="myForm" action="action/branchStoreInput.php" method="POST">
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
            <h3><label for="component_name" class="form-label">組合件名稱</label></h3>
            <input type="text" class="form-control" id="component_name" name = "component_name">
            <h3><label for="layer" class="form-label">layer</label></h3>
            <input type="text" class="form-control" id="layer" name = "layer">
            <h3><label for="supplier" class="form-label">供應商</label></h3>
            <input type="text" class="form-control" id="supplier" name = "supplier">
            <h3><label for="amount" class="form-label">數量</label></h3>
            <input type="text" class="form-control" id="amount" name = "amount">
            </div>

          <?php foreach ($items as $item => $detail): ?>
          <div class="wrapper">
            <h3><?php echo $item; ?></h3>
            <?php foreach ($detail as $key => $value): ?>

                <?php

                if (!(strcmp($key, '壓合子件名稱')&&(strcmp($key, '熱熔子件名稱')))) {

                    if (!(strcmp($key, '壓合子件名稱'))) {
                        $flag = '壓合' ;
                    } else {
                        $flag = '熱熔';
                    }
                    require("subfiles/subItems.php");
                    ?>

                    <?php
                } ?>
                <?php if (strcmp($key, 'submission_date')): ?>
                    <div class="mb-4">
                      <label for=<?php echo $key; ?> class="form-label"><?php ECHO $key.$value ?></label>
                      <input type="text" class="form-control" id=<?php echo $key; ?> name = <?php echo $key; ?>>
                    </div>
                <?php endif; ?>

            <?php endforeach; ?>
          </div>
          <?php endforeach; ?>

          <div class="mb-4">
          <h3><label for="remark" class="form-label">備註</label></h3>
          <input type="text" class="form-control" id="remark" name = "remark">
          </div>

          <!--pass $items with hidden-->
          <input type='hidden' name='items' value="<?php echo htmlentities(serialize($items)); ?>" />


          <br>
          <button name="submitBtn" id="submitBtn" type="submit" class="btn btn-success">Submit</button>
        </form>


      </div>
    </div>
  </div>


<?php
  include_once('../../../includes/template/footer.html');
?>


  <!-- Option 1: Bootstrap Bundle with Popper -->
  <script src="/CEStable/library/bootstrap-5.0.0-beta3/dist/js/bootstrap.bundle.min.js" integrity="sha384-JEW9xMcG8R+pH31jmWH6WWP0WintQrMb4s7ZOdauHnUtxwoG2vI5DkLtS3qm9Ekf" crossorigin="anonymous"></script>
  <!---->
<script type="text/javascript">
    const submitBtn = document.querySelector('#submitBtn');
    submitBtn.onclick = (e) => {
        for (let i = 0; i < pressFit_selectedList.options.length; i++) {
            pressFit_selectedList.options[i].selected = true;
            //console.log(selectedList.options[i].selected);
        }
        for (let i = 0; i < hotMelt_selectedList.options.length; i++) {
            hotMelt_selectedList.options[i].selected = true;
            //console.log(selectedList.options[i].selected);
        }
        $('#myForm').submit();
    };
</script>

  </body>
</html>
