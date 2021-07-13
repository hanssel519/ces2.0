<?php
  //include classes
  $path = $_SERVER['DOCUMENT_ROOT']."/CEStable/includes/autoLoader.inc.php";
  include $path;
  require($_SERVER['DOCUMENT_ROOT']."/CEStable/includes/importLibraries.inc.php");

//setcookie('projectName', $_GET['projectName'], time() + 3600, "/");
?>

    <link rel="stylesheet" href="/CEStable/resources/css/main.css">
    <style>
      .button1 {
          width: 250px;

      }
      .extra btn-secondary {
            color: inherit;
            padding: 15px 25px;
            font-size: 24px;
        }
      .button2 {
          display: inline-block;
          width: 340PX;
          height: 85PX;
          position: relative;
          padding: 5px 30px;
          font-size: 25px;
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
    <title>Individual Project Page!</title>
  </head>
  <body>

<?php
  require('../../includes/template/header.php');
?>
<!--body contents go here-->

<?php
//從上一頁選擇過來的


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
<?php
//check if the project exists
$obj = new Project();
if (!$obj->checkIfProExist($_GET['projectName'])) {
    header("Location: ../index.php");
}
?>

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
      <div class="container py-3" id="hanging-icons">
        <!--<h3 class="pb-2 border-bottom">File Upload Time: </h3>-->

        <div class="row g-5 pt-5">
          <div class="col-lg-6 d-flex justify-content-center fs-3 bd-highlight">
            製作
          </div>
          <div class="col-lg-6 d-flex justify-content-center fs-3 bd-highlight">
            查看 & 更改
          </div>
        </div>
        <hr>
        <div class="row g-5 pt-5">
          <div class="col-lg-6 d-flex justify-content-center">
            <!--<div class="icon-square bg-light text-dark flex-shrink-0 me-3">
              <i class="fas fa-caret-right" width="1em" height="1em"></i>
            </div>-->
            <div>
              <a href="../components/root/rootMakeNodes.php" class="btn button2">
                舊的不要用!!! <br>
                製作根節點元件(old)
              </a>
            </div>
          </div>
          <div class="col-lg-6 d-flex justify-content-center">
            <!--<div class="icon-square bg-light text-dark flex-shrink-0 me-3">
              <i class="fas fa-caret-right" width="1em" height="1em"></i>
            </div>-->
            <div>
              <!--<p>新的.</p>-->
              <a href="../components/roots/rootMake.php" class="btn button2">
                可以用!!! <br>
                製作根節點元件(new)
              </a>
            </div>
          </div>
        </div>
          <div class="row g-5 pt-5">
          <div class="col-lg-6 d-flex justify-content-center">
            <!--<div class="icon-square bg-light text-dark flex-shrink-0 me-3">
              <i class="fas fa-caret-right" width="1em" height="1em"></i>
            </div>-->
            <div>
              <a href="../components/componentsMainPage.php" class="btn button2">
                make leaf components<br>
                製作樹葉元件
              </a>
            </div>
          </div>

          <div class="col-lg-6 d-flex justify-content-center">
            <!--<div class="icon-square bg-light text-dark flex-shrink-0 me-3">
              <i class="fas fa-caret-right" width="1em" height="1em"></i>
            </div>-->
            <div>
              <a href="../components/showComponents.php" class="btn button2">
                check leaf components <br>
                檢查製作完的樹葉元件
              </a>
            </div>
          </div>

        </div>

        <div class="row g-5 py-5">

          <div class="col-lg-6 d-flex justify-content-center">
            <!--<div class="icon-square bg-light text-dark flex-shrink-0 me-3">
              <i class="fas fa-caret-right" width="1em" height="1em"></i>
            </div>-->
            <div>
              <a href="../components/branch/branchSelection.php" class="btn button2 justify-content-center">
                build tree <br>
                Make組合鍵
              </a>
            </div>
          </div>

          <div class="col-lg-6 d-flex justify-content-center">
            <!--<div class="icon-square bg-light text-dark flex-shrink-0 me-3">
              <i class="fas fa-caret-right" width="1em" height="1em"></i>
            </div>-->
            <div>
              <a href="#" class="btn button2">
                check tree(還沒好不要用!!!~~) <br>
                查看樹狀結構
              </a>
            </div>
          </div>

          <!--<div class="col-md-4 d-flex justify-content-center">
            <div class="icon-square bg-light text-dark flex-shrink-0 me-3">
              <i class="fas fa-caret-right" width="1em" height="1em"></i>
            </div>
            <div>
              <a href="#" class="btn btn-dark">
                預留一個位置
              </a>
            </div>
          </div>-->

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
