<?php
  //include classes
  $path = $_SERVER['DOCUMENT_ROOT']."/CEStable/includes/autoLoader.inc.php";
  include $path;
  require($_SERVER['DOCUMENT_ROOT']."/CEStable/includes/importLibraries.inc.php");
?>
<link rel="stylesheet" href="/CEStable/resources/css/main.css">
<style>
    .button2 {
        display: inline-block;
        width: 240PX;
        height: 60PX;
        position: relative;
        padding: 5px 30px;
        font-size: 30px;
        cursor: pointer;
        text-align: center;
        text-decoration: none;
        outline: none;
        color: #fff;
        background-color: #69946b;
        border: none;
        border-radius: 5px;
        box-shadow: 0 0 #999;
    }
    .button2:hover {
        background-color: #3e8e41;
        color: #fff;
    }
    .button2:active {
        background-color: #3e8e41;
        box-shadow: 0 5px #666;
        transform: translateY(4px);
    }

</style>
    <title>Leaf Components Page!</title>
  </head>
  <body>

<?php
  require('../../includes/template/header.php');
?>
<!--body contents go here-->
<?php
  $items = array(
    'Plastic',
    'MG',
    'AL',
    //'Assembly',
    'Sheet_Metal',
    'XX',
  );
?>
<?php print_r($_COOKIE); ?>
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
        <h2 class="pb-2 border-bottom">Leaf Components Page</h2>

        <?php $i = 1; ?>
        <?php foreach ($items as $item) {
          if ($i % 3 == 1) {
            echo '<div class="row g-5 py-5">';
          }
        ?>
        <div class="col-md-4 d-flex align-items-start">
          <div class="icon-square bg-light text-dark flex-shrink-0 me-3">
            <i class="fas fa-caret-right" width="1em" height="1em"></i>
          </div>
          <div>

            <a href="leafSelection.php?material=<?php echo $item; ?>" class="button2">
              <?php echo $item; ?>
            </a>
          </div>
        </div>
        <?php if ($i % 3 == 0) {
          echo '</div>';
        }
        $i++;?>
        <?php }?>
        <?php
        if ($i % 3 != 1) {
          echo '</div>';
        }
        ?>

<!--
        <div class="row g-5 py-5">
          <div class="col-md-4 d-flex align-items-start">
            <div class="icon-square bg-light text-dark flex-shrink-0 me-3">
              <i class="fas fa-camera-retro" width="1em" height="1em"></i>
            </div>
            <div>
              <h2 class="pb-2">Plastic</h2>
              <a href="leafSelection.php" class="btn btn-dark">
                Plastic
              </a>
            </div>
          </div>

          <div class="col-md-4 d-flex align-items-start">
            <div class="icon-square bg-light text-dark flex-shrink-0 me-3">
              <i class="fas fa-camera-retro" width="1em" height="1em"></i>
            </div>
            <div>
              <h2 class="pb-2">MG</h2>
              <a href="#" class="btn btn-dark">
                MG
              </a>
            </div>
          </div>
          <div class="col-md-4 d-flex align-items-start">
            <div class="icon-square bg-light text-dark flex-shrink-0 me-3">
              <svg class="bi" width="1em" height="1em"><use xlink:href="#tools"/></svg>
            </div>
            <div>
              <h2 class="pb-2">AL</h2>
              <a href="#" class="btn btn-dark">
                AL
              </a>
            </div>
          </div>
        </div>


        <div class="row g-5 py-5">
          <div class="col-md-4 d-flex align-items-start">
            <div class="icon-square bg-light text-dark flex-shrink-0 me-3">
              <i class="fas fa-camera-retro" width="1em" height="1em"></i>
            </div>
            <div>
              <h2 class="pb-2">SHEET METAL</h2>
              <a href="#" class="btn btn-dark">
                SHEET METAL
              </a>
            </div>
          </div>

          <div class="col-md-4 d-flex align-items-start">
            <div class="icon-square bg-light text-dark flex-shrink-0 me-3">

            </div>
            <div>
              <h2 class="pb-2">Assembly</h2>
              <a href="#" class="btn btn-dark">
                Assembly
              </a>
            </div>
          </div>
          <div class="col-md-4 d-flex align-items-start">
            <div class="icon-square bg-light text-dark flex-shrink-0 me-3">
            </div>
            <div>
              <h2 class="pb-2">XX</h2>
              <a href="#" class="btn btn-dark">
                XX
              </a>
            </div>
          </div>
        </div>
      -->

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
