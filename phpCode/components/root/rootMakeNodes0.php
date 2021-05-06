<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <script src="/CEStable/library/jquery/jquery-3.6.0.js"></script>
    <link rel="stylesheet" href="/CEStable/library/bootstrap-5.0.0-beta3/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="/CEStable/library/fontawesome-free-5.15.3-web/fontawesome-free-5.15.3-web/css/all.css">
    <link rel="stylesheet" href="/CEStable/resources/css/main.css">

    <title>Home Page</title>
  </head>
  <body>


<?php
  require('../../../includes/template/header.php');
?>

<!--body contents go here-->
<div class="container">

  <div class="wrapper m-md-2 pt-md-3">


    <div class="container">
      <button id="addNewRootComponents" type="button" class="btn btn-outline-danger">+add</button>
      <button type="button" class="btn btn-outline-success">Success</button>
      <button type="button" class="btn btn-outline-dark">Dark</button>
    </div>

    <div class="container m-md-2 pt-md-3">
      <h1>make root components</h1>

      <!--
      A Cover & Bezel  相關
      LCD_OTHERS
      C cover & D door  相關
      MB Others
      -->
      <div class="container py-5" id="hanging-icons">
        <h3 class="pb-2 border-bottom">File Upload Time: </h2>

        <div class="row g-5 pt-5">

          <div class="col-md-6 d-flex align-items-start">
            <div class="icon-square bg-light text-dark flex-shrink-0 me-3">
              <i class="fas fa-caret-right" width="1em" height="1em"></i>
            </div>
            <div>
              <div class="d-flex ">
                <h3 CLASS="p-2 w-100 bd-highlight">A Cover & Bezel 相關</h3>

                <button id="addNewRootComponents" type="button" class="btn mb-2 btn-green" >+add</button>
              </div>
              <a href="../components/root/rootMakeNodes.php" class="btn mb-2 btn-dark">
                Pavilion_360_FF_FF_PLUS_LCD_COVER_HD_SUB_ASSY
                Pavilion_360_FF_FF_PLUS_LCD_COVER_FHD_SUB_ASSY
                Pavilion_360_SFF_PLUS_LCD_COVER_SUB_ASSY
              </a>

              <a href="../components/root/rootMakeNodes.php" class="btn mb-2 btn-dark">
                Pavilion_360_LCD_COVER_BUMPER_SUB_ASSY
              </a>
            </div>
          </div>

          <div class="col-md-6 d-flex align-items-start">
            <div class="icon-square bg-light text-dark flex-shrink-0 me-3">
              <i class="fas fa-caret-right" width="1em" height="1em"></i>
            </div>
            <div>
              <div class="d-flex justify-content-between">
                <h3 class="w-100">LCD_OTHERS</h3>
                <button id="addNewRootComponents" type="button" class="btn mb-2 btn-green">+add</button>
              </div>
              <a href="../components/componentsMainPage.php" class="btn btn-dark">
                Pavilion_360_LCD_SLIDER_SUB_ASSY
              </a>
            </div>
          </div>


        </div>

        <div class="row g-5 pt-5">

          <div class="col-md-6 d-flex align-items-start">
            <div class="icon-square bg-light text-dark flex-shrink-0 me-3">
              <i class="fas fa-caret-right" width="1em" height="1em"></i>
            </div>
            <div>
              <div class="d-flex justify-content-between">
                <h3>C cover & D door  相關</h3>
                <button id="addNewRootComponents" type="button" class="btn mb-2 btn-green">+add</button>
              </div>
              <a href="../components/componentsMainPage.php" class="btn mb-2 btn-dark">
                Pavilion_360_FF_LOG_UP_SUB_ASSY
                Pavilion_360_FF_PLUS_LOG_UP_ASSY_WLAN
                Pavilion_360_FF_PLUS_LOG_UP_ASSY_WWAN
                Pavilion_360_SFF_PLUS_LOG_UP_ASSY
                Pavilion_360_FF_LOG_UP_SUB_ASSY_FPR
                Pavilion_360_FF_PLUS_LOG_UP_ASSY_WLAN_FPR
                Pavilion_360_FF_PLUS_LOG_UP_ASSY_WWAN_FPR
                Pavilion_360_SFF_PLUS_LOG_UP_ASSY_FPR
              </a>
              <a href="../components/componentsMainPage.php" class="btn mb-2 btn-dark">
                Pavilion_360_LOG_UP_BUMPER_SUB_ASSY_FRONT
              </a>
            </div>
          </div>

          <div class="col-md-6 d-flex align-items-start">
            <div class="icon-square bg-light text-dark flex-shrink-0 me-3">
              <i class="fas fa-caret-right" width="1em" height="1em"></i>
            </div>
            <div>

              <div class="d-flex justify-content-between">
                <h3 class="">Logic Others</h3>
                <button id="addNewRootComponents" type="button" class="btn mb-2 btn-green">+add</button>
              </div>

              <a href="../components/componentsMainPage.php" class="btn mb-2 btn-dark">
                Pavilion_360_TP_SUPP_BRK_AL_ASSY
              </a>
              <a href="../components/componentsMainPage.php" class="btn mb-2 btn-dark">
                Pavilion_360_KB_SUPP_BRK_ASSY
              </a>
            </div>
          </div>
        </div>



        <div class="row g-5 py-5">

          <div class="col-md-4 d-flex align-items-start">
            <div class="icon-square bg-light text-dark flex-shrink-0 me-3">
              <i class="fas fa-caret-right" width="1em" height="1em"></i>
            </div>
            <div>
              <div class="d-flex justify-content-between">
                <h3>MB Others</h3>
                <button id="addNewRootComponents" type="button" class="btn mb-2 btn-green">+add</button>
              </div>

              <a href="#" class="btn mb-2 btn-dark">
                Pavilion_360_CPU_SUPPORT_BRK_SUB_ASSY
              </a>
              <a href="#" class="btn mb-2 btn-dark">
                Pavilion_360_DDR_SHIELDING_CAN_SUB_ASSY
              </a>
            </div>
          </div>

          <div class="col-md-4 d-flex align-items-start">
            <div class="icon-square bg-light text-dark flex-shrink-0 me-3">
              <i class="fas fa-caret-right" width="1em" height="1em"></i>
            </div>
            <div>
              <h3>check tree</h3>
              <p>查看樹狀結構</p>
              <a href="#" class="btn btn-dark">
                check tree
              </a>
            </div>
          </div>

          <div class="col-md-4 d-flex align-items-start">
            <div class="icon-square bg-light text-dark flex-shrink-0 me-3">
              <i class="fas fa-caret-right" width="1em" height="1em"></i>
            </div>
            <div>
              <h3>XX</h3>
              <p>預留一個位置</p>
              <a href="#" class="btn btn-dark">
                XX
              </a>
            </div>
          </div>

        </div>

      </div>
    </div>



  </div>
</div>

<?php
  include_once('../../../includes/template/footer.html');
?>
<!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="/CEStable/library/bootstrap-5.0.0-beta3/dist/js/bootstrap.bundle.min.js" integrity="sha384-JEW9xMcG8R+pH31jmWH6WWP0WintQrMb4s7ZOdauHnUtxwoG2vI5DkLtS3qm9Ekf" crossorigin="anonymous"></script>

    <script type="text/javascript">
        document.getElementById("addNewRootComponents").onclick = function () {
            location.href = "projects/newProject.php";
        };
    </script>
  </body>
</html>
