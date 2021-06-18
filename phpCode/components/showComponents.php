<?php
  //include classes
  $path = $_SERVER['DOCUMENT_ROOT']."/CEStable/includes/autoLoader.inc.php";
  include $path;
  require($_SERVER['DOCUMENT_ROOT']."/CEStable/includes/importLibraries.inc.php");

?>

    <link rel="stylesheet" href="/CEStable/resources/css/main.css">

    <title>Show Components</title>
  </head>
  <body>

    <script type="text/javascript">
    function deleteSuccess() {
        swal({
          title: '刪除component成功!',
          //text: '誤加分號,單雙引號',
          //timer: 3000,
          button: true,
          icon: 'success'
        });
    }
    function multiEdition() {
        swal({
          title: '更動無效 (同時更動)!',
          button: true,
          icon: 'error'
        });
    }
    </script>

<?php
  require('../../includes/template/header.php');
?>


<?php
var_dump($_GET);
echo "<br>";
var_dump($_POST);
echo "<br>";
var_dump($_COOKIE);
if (isset($_COOKIE['projectName'])) {
    //check if the project exists
    $obj = new Project();
    if (!$obj->checkIfProExist($_COOKIE['projectName'])) {
        header("Location: ../index.php");
    }
    if (isset($_COOKIE['material'])) {
        unset($_COOKIE['material']);
    }
    if (isset($_GET['error'])) {
        if (!strcmp($_GET['error'], 'multiEdition')) {
            echo "<script>multiEdition();</script>";
        }
    }
}else {
    header("Location: ../index.php");
}

var_dump($_GET);
echo "<br>";
var_dump($_POST);
echo "<br>";
var_dump($_COOKIE);

?>

<?php
if (isset($_GET['flag'])) {
    if ($_GET['flag'] == 'delete') {
        echo "<script>deleteSuccess()</script>";
    }
}
?>
<!--modal for component copy-->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Enter your component name</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>

          <form id="copy_form" action="singleComponent/action/copy.php?projectName=<?php echo $_COOKIE['projectName']; ?>" method="POST">
            <div class="modal-body">
              <p id="id_name"></p>
                <div class="mb-3">
                  <label for="inputName" class="form-label">enter new component name below</label>
                  <input type="text" class="form-control" name="componentName" id="inputName" autocomplete="off" required placeholder="enter component name">
                </div>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
              <button type="submit" name="saveNewProject" class="btn btn-primary">Submit</button>
            </div>
          </form>

        </div>
    </div>
</div>
<!--body contents go here-->
<div class="container">
  <div class="wrapper m-md-2 pt-md-3">

        <div class="row">
            <div class="col-8">
                <h2 class="text-success">Project Name: <?php echo $_COOKIE['projectName'];?></h2>
            </div>
            <div class="col-4">
                <a href="../projects/individualMainPage.php?projectName=<?php echo $_COOKIE['projectName']; ?>" class="btn btn-outline-success float-end">返回當前project首頁</a>
            </div>
        </div>
    <div class="container pt-2">
        <!-- Button trigger modal -->
        <a type="button" class="btn btn-outline-secondary" href="componentsMainPage.php">Continue create components</a>
        <a id="newProjectBtn" type="button" href="componentsMainPage.php" class="btn btn-outline-success">decoration</a>
        <a type="button" class="btn btn-outline-dark">decoration</a>
    </div>


    <div class="container py-4">
        <div class="container m-md-2 pt-md-3">
            <h4 class="pb-2 border-bottom">show components</h4>

            <div class="list-group list-group-flush">
                <div class="list-group-item">
                    <div class="row align-items-center">
                        <div class="col fs-4">
                            name
                        </div>
                        <div class="col fs-4">
                            material
                        </div>
                        <div class="col fs-4">
                            submission_date
                        </div>
                        <div class="col fs-4">
                            Action
                        </div>
                    </div>
                </div>
                  <!--list all the components-->
                  <?php
                  $components = new Components();
                  $items = $components->showAllComponents($_COOKIE['projectName']);
                  if (! $items) {//no components
                      ?>
                      <p class="pt-5 text-center">尚無資料</p>
                      <?php
                  }
                  foreach ($items as $key => $value) {
                    ?>
                      <div class="list-group-item list-group-item-action list-group-item-light">
                          <div class="container">
                          <div class="row align-items-center">
                            <div class="col fs-4">
                                <?php echo $value['name']. ",id: ".$value['id']?>
                            </div>
                            <div class="col fs-4">
                                <?php echo $value['material'] ?>
                            </div>
                            <div class="col fs-4">
                                <?php echo $value['submission_date'] ?>
                            </div>
                            <div class="col fs-4">
                                <a type="button" href="singleComponent/singleComponentCheck.php?projectName=<?php echo $_COOKIE['projectName'];?>&componentID=<?php echo $value['id'];?>&componentName=<?php echo $value['name']; ?>&action=check" class="btn btn-secondary" name="button">查看</a>

                                <a type="button" href="singleComponent/singleComponentModify.php?projectName=<?php echo $_COOKIE['projectName'];?>&componentID=<?php echo $value['id'];?>&componentName=<?php echo $value['name']; ?>&action=modify" class="btn btn-secondary" name="button">修改</a>

                                <a type="button" href="singleComponent/singleComponentDelete.php?projectName=<?php echo $_COOKIE['projectName'];?>&componentID=<?php echo $value['id'];?>&componentName=<?php echo $value['name']; ?>&action=delete" class="btn btn-secondary" name="button">刪除</a>

                                <a type="button" id="copy_btn" onclick="copy_onclick('<?php echo $value['id'];?>','<?php echo $value['name'];?>')" class="btn btn-secondary" name="button">複製</a>
                            </div>
                          </div>
                        </div>
                    </div>
                    <?php
                  }
                  ?>
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
    <script src="/CEStable/library/jquery/jquery-3.6.0.js"></script>

    <script type="text/javascript">
        function copy_onclick(component_id, component_name) {
            document.getElementById('id_name').innerHTML = "copy from component : "+component_name;
            var formAction = $('#copy_form').attr('action');
            var url = "&componentID="+component_id;
            $('#copy_form').attr('action', formAction + url);
            $('#exampleModal').modal('show');
        }


    </script>
  </body>
</html>
