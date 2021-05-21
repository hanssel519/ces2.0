<?php
  //include classes
  $path = $_SERVER['DOCUMENT_ROOT']."/CEStable/includes/autoLoader.inc.php";
  include $path;
  require($_SERVER['DOCUMENT_ROOT']."/CEStable/includes/importLibraries.inc.php");

?>

    <link rel="stylesheet" href="/CEStable/resources/css/main.css">

    <title>component modify</title>
  </head>
  <body>


<?php
  require('../../../includes/template/header.php');
?>



<?php print_r($_COOKIE); ?>
<!--body contents go here-->
<div class="container">
  <div class="wrapper m-md-2 pt-md-3">

<?php
    $components = new Components;
    $return = $components->getSelectedBigItem($_GET['projectName'], $_GET['componentID'], $_GET['componentName']);


    //$return = $components->modifyComponent($_GET['projectName'], $_GET['componentID'], $_POST['componentName']);

?>

    <h2 class="text-success">Project Name: <?php echo $return['info']['projectName']; ?></h2>
        <?php
          $user = new Users($_SERVER['PHP_AUTH_USER']);
          //$user->getUserName();
          $department = $user->getUserName();
          echo "depar: ".$department."<br>";
          $department = $user->getUsersDepartment();
          echo "depar: ".$department."<br>";
        ?>
    <div class="container py-5" id="hanging-icons">
      <h2 class="pb-2 border-bottom">Select Attributes (<?php echo $return['info']['material']; ?>)</h2>

      <?php
        $items = array(
            'Plastic' => array('塑膠'=>'me', '漆'=>'id', 'nut'=>'me', '成型'=>'me', '熱熔nut'=>'me', '濺鍍'=>'me', 'cnc'=>'me', 'vm'=>'id', '電鍍'=>'id', '塗裝'=>'id', '印刷'=>'id'),
            'MG' => array('塑膠'=>'me', '鎂鋁'=>'me', '漆'=>'id', '冷鍛'=>'me', '壓鑄'=>'me', '埋射'=>'me', '衝切'=>'me', '研磨'=>'me', 'cnc'=>'me', '皮膜'=>'id', '塗裝'=>'id', '加工'=>'id', '雷雕'=>'id', '印刷'=>'id'),
            'AL' => array('塑膠'=>'me', '鋁'=>'me', '鋁擠'=>'me', '髮絲'=>'id', '衝壓'=>'me', '埋射'=>'me', '衝切'=>'me', '研磨'=>'me', 'cnc'=>'me', '噴砂'=>'id', '陽極'=>'id', '加工'=>'id', '蝕刻'=>'id', '雷雕'=>'id', '印刷'=>'id'),
            'Assembly' => array('膠'=>'me', '點膠'=>'me', '壓合'=>'me', '熱熔'=>'me', '組裝'=>'me'),
            'Sheet_Metal' => array('鐵件'=>'me', '漆'=>'id', 'nut'=>'me', '銅柱'=>'me', '衝壓'=>'me', 'cnc'=>'me', 'ed'=>'id', '塗裝'=>'id', '加工'=>'id', '蝕刻'=>'id', '雷雕'=>'id', '印刷'=>'id'));
      ?>

          <form action="action/modify.php" method="post">
          <?php
          //$return['info']['material']= plastic, al ...
          $small_item_for_your_department = array();
          foreach ($items[$return['info']['material']] as $key => $value) {
              $small_item_for_your_department[$key] = 0;
              if ($value==$department) { //get 'me' or 'id' part
                  $small_item_for_your_department[$key] = 1;
                  ?>

                  <div class="form-check mt-4">
                    <input class="form-check-input" type="checkbox" value=<?php echo $key; ?> id=<?php echo $key; ?> name="selection[]" >
                    <label class="form-check-label" for=<?php echo $key; ?>>
                      <?php
                      if ($return['small_item_include'][$key]) {
                          echo '<p class="text-primary fw-bold fs-4">'.$key.'</p>';
                      }else {
                          echo '<p class="text-secondary fs-4">'.$key.'</p>';
                      }
                      ?>
                    </label>
                  </div>

                  <?php
              }
          }
          ?>
          <?php
          /*
          Array(
                [projectName] => 3
                [componentID] => 2
                [componentName] => al1
                [material] => AL
            )*/
          foreach($return['info'] as $key => $value){
              echo '<input type="hidden" name="info['.$key.']" value="'. $value. '">';
          }
          foreach($return['small_item_include'] as $key => $value){
              echo '<input type="hidden" name="small_item_include['.$key.']" value="'. $value. '">';
          }

          ?>
          <input type='hidden' name='small_item_for_your_department' value="<?php echo htmlentities(serialize($small_item_for_your_department)); ?>" />
          <?php
echo '<pre>'; print_r($return['info']); echo '</pre>';
echo '<pre>'; print_r($return['small_item_include']); echo '</pre>';
          ?>
          <br>
          <button type="submit" class="btn btn-success">Submit</button>
        </form>



    </div>

  </div>
</div>

<?php
  include_once('../../../includes/template/footer.html');
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