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

<?php
/*var_dump($_GET);
echo "<br>";
var_dump($_POST);
echo "<br>";
var_dump($_COOKIE);*/
if (!isset($_COOKIE['projectName'])) {
    header("Location: ../../index.php");
}elseif (!isset($_GET['componentID'])|| !isset($_GET['action']) || !isset($_GET['componentName'])) {
    header("Location: ../showComponents.php");
}elseif (empty($_GET['componentID'])||empty($_GET['componentName'])||empty($_GET['action'])) {
    header("Location: ../showComponents.php");
}
?>
<!--body contents go here-->

<?php
    $components = new Components;
    if(!$components->checkIfExist($_GET['projectName'], $_GET['componentID'])){
      header("Location: ../showComponents.php?error=deleted");
    }
    $component_serial_num = $components->getSerialNum($_GET['projectName'], $_GET['componentID']);
    if(isset($_COOKIE['serial_number'])) {
        unset($_COOKIE['serial_number']);
    }
    setcookie('serial_number', $component_serial_num, -1, "/");
    $return = $components->getSelectedBigItem($_GET['projectName'], $_GET['componentID'], $_GET['componentName']);

    //echo '<pre>'; print_r($return); echo '</pre>';
    $user = new Users($_SERVER['PHP_AUTH_USER']);
    $UserName = $user->getUserName();
    //echo "UserName: ".$UserName."<br>";
    $department = $user->getUsersDepartment();
    //echo "depar: ".$department."<br>";

    /*
    $return  => Array
    (
        [info] => Array(
                [projectName] => n8
                [componentID] => 4
                [componentName] => al2
                [material] => AL
            )

        [small_item_include] => Array
            (
                [塑膠] => 1
                [鋁] => 1
                [鋁擠] => 0
                [髮絲] => 0
                [衝壓] => 0
                [埋射] => 0
                [衝切] => 0
                [研磨] => 0
                [cnc] => 0
                [噴砂] => 0
                [陽極] => 0
                [加工] => 0
                [蝕刻] => 0
                [雷雕] => 0
                [印刷] => 0
            )

    )

    */
?>
<div class="container">
  <div class="wrapper m-md-2 pt-md-3">
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
                    <input class="form-check-input" type="checkbox" value=<?php echo $key; ?> id=<?php echo $key; ?> name="selection[]" <?php if ($return['small_item_include'][$key]){
                        echo "checked";
                    } ?>>
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
          //3個 hidden info
          foreach($return['info'] as $key => $value){
              echo '<input type="hidden" name="info['.$key.']" value="'. $value. '">';
          }
          foreach($return['small_item_include'] as $key => $value){
              echo '<input type="hidden" name="small_item_include['.$key.']" value="'. $value. '">';
          }
          ?>
          <input type='hidden' name='small_item_for_your_department' value="<?php echo htmlentities(serialize($small_item_for_your_department)); ?>" />

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
