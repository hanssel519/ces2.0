<?php
  //include classes
  $path = $_SERVER['DOCUMENT_ROOT']."/CEStable/includes/autoLoader.inc.php";
  include $path;
  require($_SERVER['DOCUMENT_ROOT']."/CEStable/includes/importLibraries.inc.php");
?>

    <title>Leaf Components Page!</title>
  </head>
  <body>

<?php
  require('../../includes/template/header.php');
?>
<!--body contents go here-->
<?php
    if (isset($_GET['material'])) {
    if(isset($_COOKIE['material'])) {
            unset($_COOKIE['material']);
        }
        setcookie('material', $_GET['material'], -1, "/");

    }else {//從下一頁 按上一頁return page的
        //do nothing to keep cookie
        header("Location: /componentsMainPage.php");
    }
?>
<?php print_r($_COOKIE); ?>
  <div class="container">
    <div class="wrapper m-md-2 p-md-5">
      <h2 class="text-success">Project Name: <?php echo $_COOKIE['projectName']; ?></h1>
          <?php
            $user = new Users($_SERVER['PHP_AUTH_USER']);
            //$user->getUserName();
            $department = $user->getUserName();
            echo "depar: ".$department."<br>";
            $department = $user->getUsersDepartment();
            echo "depar: ".$department."<br>";
          ?>
      <div class="container py-5" id="hanging-icons">
        <h2 class="pb-2 border-bottom">Select Attributes (<?php echo $_GET['material']; ?>)</h2>

        <?php
          $itemss = array(
            '塑膠', '漆', 'Nut', '成型', '熱熔Nut', '濺鍍', 'CNC', 'VM', '電鍍', '塗裝', '印刷',
          );
          $items = array(
              'Plastic' => array('塑膠'=>'me', '漆'=>'id', 'nut'=>'me', '成型'=>'me', '熱熔nut'=>'me', '濺鍍'=>'me', 'cnc'=>'me', 'vm'=>'id', '電鍍'=>'id', '塗裝'=>'id', '印刷'=>'id'),
              'MG' => array('塑膠'=>'me', '鎂鋁'=>'me', '漆'=>'id', '冷鍛'=>'me', '壓鑄'=>'me', '埋射'=>'me', '衝切'=>'me', '研磨'=>'me', 'cnc'=>'me', '皮膜'=>'id', '塗裝'=>'id', '加工'=>'id', '雷雕'=>'id', '印刷'=>'id'),
              'AL' => array('塑膠'=>'me', '鋁'=>'me', '鋁擠'=>'me', '髮絲'=>'id', '衝壓'=>'me', '埋射'=>'me', '衝切'=>'me', '研磨'=>'me', 'cnc'=>'me', '噴砂'=>'id', '陽極'=>'id', '加工'=>'id', '蝕刻'=>'id', '雷雕'=>'id', '印刷'=>'id'),
              'Assembly' => array('膠'=>'me', '點膠'=>'me', '壓合'=>'me', '熱熔'=>'me', '組裝'=>'me'),
              'Sheet_Metal' => array('鐵件'=>'me', '漆'=>'id', 'nut'=>'me', '銅柱'=>'me', '衝壓'=>'me', 'cnc'=>'me', 'ed'=>'id', '塗裝'=>'id', '加工'=>'id', '蝕刻'=>'id', '雷雕'=>'id', '印刷'=>'id'));
        ?>

            <form action="fillInput.php" method="post">
            <?php
            foreach ($items[$_GET['material']] as $key => $value) {
                if ($value==$department) {//get 'me' or 'id' part
                    ?>
                    <div class="form-check mt-4">
                      <input class="form-check-input" type="checkbox" value=<?php echo $key; ?> id=<?php echo $key; ?> name="selection[]" >
                      <label class="form-check-label" for=<?php echo $key; ?>>
                        <?php echo $key; ?>
                      </label>
                    </div>
                    <?php
                }
            }
            ?>
            <br>
            <button type="submit" class="btn btn-success">Submit</button>
          </form>



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
