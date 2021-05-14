<?php
  //include classes
  $path = $_SERVER['DOCUMENT_ROOT']."/CEStable/includes/autoLoader.inc.php";
  include $path;
  require($_SERVER['DOCUMENT_ROOT']."/CEStable/includes/importLibraries.inc.php");

//setcookie('projectName', $_GET['projectName'], time() + 3600, "/");
?>

    <link rel="stylesheet" href="/CEStable/resources/css/main.css">
    <title>Individual Project Page!</title>
  </head>
  <body>

<?php
  require('../../includes/template/header.php');
?>
<!--body contents go here-->

<?php
//從上一頁選擇過來的

//setcookie('projectName', $_GET['projectName'], time() + 3600, "/");
var_dump($_GET['projectName']);
echo $_GET['projectName'];
if (isset($_GET['projectName'])) {
    if(isset($_COOKIE['projectName'])) {
        unset($_COOKIE['projectName']);
    }
    setcookie('projectName', $_GET['projectName'], -1, "/");

}else {//從下一頁 按上一頁return page的
    //do nothing to keep cookie
    header("Location: ../index.php");
}
?>
<?php print_r($_COOKIE); ?>

  <div class="container">
    <div class="wrapper m-md-2 p-md-5">
      <h2 class="text-success" >Project Name: <?php echo $_GET['projectName'];?></h1>

      <!--
        list upload file timestamp
        make root nodes
        check root nodes
        make leaf components
        check leaf components
        build tree
        check tree
      -->
      <div class="container py-5" id="hanging-icons">
        <h3 class="pb-2 border-bottom">File Upload Time: </h3>
        <div class="row g-5 pt-5">

          <div class="col-md-6 d-flex align-items-start">
            <div class="icon-square bg-light text-dark flex-shrink-0 me-3">
              <i class="fas fa-caret-right" width="1em" height="1em"></i>
            </div>
            <div>
              <h3>make root nodes</h3>
              <p>製作根節點元件.</p>
              <a href="../components/root/rootMakeNodes.php" class="btn btn-dark">
                make root nodes
              </a>
            </div>
          </div>
          <div class="col-md-6 d-flex align-items-start">
            <div class="icon-square bg-light text-dark flex-shrink-0 me-3">
              <i class="fas fa-caret-right" width="1em" height="1em"></i>
            </div>
            <div>
              <h3>check root nodes</h3>
              <p>檢查根節點元件.</p>
              <a href="../components/componentsMainPage.php" class="btn btn-green">
                check root nodes
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
              <h3>make leaf components</h3>
              <p>製作樹葉元件. Base on input excel.</p>
              <a href="../components/componentsMainPage.php" class="btn btn-dark">
                make leaf components
              </a>
            </div>
          </div>

          <div class="col-md-6 d-flex align-items-start">
            <div class="icon-square bg-light text-dark flex-shrink-0 me-3">
              <i class="fas fa-caret-right" width="1em" height="1em"></i>
            </div>
            <div>
              <h3>check leaf components</h3>
              <p>檢查製作完的樹葉元件 .</p>
              <a href="../components/showComponents.php" class="btn btn-dark">
                check leaf components
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
              <h3>build tree</h3>
              <p>拉compoents和(LCD Cover Sub, LCD Bezel Sub...)關係</p>
              <a href="#" class="btn btn-dark">
                build tree
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




<?php
  include_once('../../includes/template/footer.html');
?>


  <!-- Option 1: Bootstrap Bundle with Popper -->
  <script src="/CEStable/library/bootstrap-5.0.0-beta3/dist/js/bootstrap.bundle.min.js" integrity="sha384-JEW9xMcG8R+pH31jmWH6WWP0WintQrMb4s7ZOdauHnUtxwoG2vI5DkLtS3qm9Ekf" crossorigin="anonymous"></script>
  <script type="text/javascript">

  </script>

  </body>
</html>
