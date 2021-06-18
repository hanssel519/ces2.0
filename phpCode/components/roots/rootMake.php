<?php
  //include classes
  $path = $_SERVER['DOCUMENT_ROOT']."/CEStable/includes/autoLoader.inc.php";
  include $path;
  require($_SERVER['DOCUMENT_ROOT']."/CEStable/includes/importLibraries.inc.php");
  //$path = $_SERVER['DOCUMENT_ROOT']."/CEStable/library/phpDebug/ChromePhp.php";
  //include $path;

?>


    <link rel="stylesheet" href="/CEStable/resources/css/main.css">
    <link rel="stylesheet" href="/CEStable/resources/css/rootMake.css">

    <title>Root Make Page</title>
  </head>
  <body>


<?php
  require('../../../includes/template/header.php');
?>
<?php

var_dump($_GET);
echo "<br>";
var_dump($_POST);
echo "<br>";
var_dump($_COOKIE);

//不是從前首頁進入, 可能由url進入
if (!isset($_COOKIE['projectName'])) {
    header("Location: ../../index.php");
}
else {
    //check if the project exists
    $obj = new Project();
    if (!$obj->checkIfProExist($_COOKIE['projectName'])) {
        header("Location: ../../index.php");
    }
}

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

      <div class="container mt-md-4">
        <div class="row align-items-center">
          <div class="col"><h4 class="text-center">請選擇要加入的物件</h4></div>
          <div class="col"><h4 class="text-center">已選物件</h4></div>
          <div class="col"><h4 class="text-center">已建立</h4></div>
        </div>
        <div class="row align-items-center">
          <div class="col-8">
            <form class="form-validation" method="post" id="myForm" action="action/rootAdd.php">
            <div class="sub-entry">
                <div class="wrapper">
                    <div class="mt-md-3">
                        <label for="branchList"><h5>branch List</h5></label>
                        <select class="form-select" size="3" aria-label="size 8 select example" id="branchList" name="branchList" multiple>
                            <option name="1" value="1">One</option>
                          <option name="2" value="2">Two</option>
                          <option name="3" value="3">Three</option>
                        </select>

                        <button class="mt-md-3 btn btn-success" id="branchAdd">Add</button>
                    </div>

                    <div class="mt-md-3">
                        <label for="leafList"><h5>Leaf List</h5></label>
                        <select class="form-select" size="3" aria-label=" select example" id="leafList" name="leafList[]" multiple size="8">
                            <option value="1">One</option>
  <option name="2" value="2">Two</option>
  <option name="3" value="3">Three</option>
  <option name="1" value="1">One</option>

                        </select>
                        <button class="mt-md-3 btn btn-success" id="leafAdd">Add</button>
                    </div>
                </div>
            </div>
            <div class="sub-entry">
                <div class="wrapper">
                    <div class="m-md-3">
                        <label for="selectedList"><h5>Selected List</h5></label>
                        <select class="form-select" size="3" aria-label="size 10 select example" id="selectedList" name="selectedList[]" multiple>
                        </select>
                        <button class="mt-md-3 btn btn-success" id="btnRemove">Remove Selected items</button>
                    </div>
                    <div class="m-md-3">
                        <label class="form-label" for="name"><h5>Name:</h5></label>
                        <input type="text" class="form-control" name="rootName" id="name" placeholder="Enter a framework" autocomplete="off" required>
                    </div>
                </div>
            </div>
            <div class="button" id="submitBtn">
                <button type="submit" class="btn btn-warning" name="submit" >Submit selections</button>
            </div>
            </form>


          </div>

          <div class="col">

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
    <script src="/CEStable/library/jquery/jquery-3.6.0.js"></script>
    <script type="text/javascript">


        const branchList = document.querySelector('#branchList');
        const branchAdd = document.querySelector('#branchAdd');
        const leafList = document.querySelector('#leafList');
        const leafAdd = document.querySelector('#leafAdd');
        const selectedList = document.querySelector('#selectedList');
        const btnRemove = document.querySelector('#btnRemove');
        const submitBtn = document.querySelector('#submitBtn');

        // remove selected option
        branchAdd.onclick = (e) => {
            e.preventDefault();
            // save the selected option
            let selected = [];

            for (let i = 0; i < branchList.options.length; i++) {
                selected[i] = branchList.options[i].selected;
                branchList.options[i].selected = false;
            }
            // remove all selected option
            let index = branchList.options.length;
            while (index--) {
                if (selected[index]) {
                    // create a new option
                    const option = new Option('(branch) '+branchList.options[index].value, 'branch_'+branchList.options[index].value, true, false);
                    selectedList.add(option, undefined);
                    console.log(branchList.options[index].value);
                    console.log(option);
                    branchList.options[index].style.display = 'none';
                    console.log(selectedList);
                }
            }
        };
        // remove selected option
        leafAdd.onclick = (e) => {
            e.preventDefault();
            // save the selected option
            let selected = [];
            //record those are selected
            for (let i = 0; i < leafList.options.length; i++) {
                selected[i] = leafList.options[i].selected;
                leafList.options[i].selected = false;
            }

            // remove all selected option
            let index = leafList.options.length;
            while (index--) {
                if (selected[index]) {
                    // create a new option
                    const option = new Option('(leaf) '+leafList.options[index].value, 'leaf_'+leafList.options[index].value, true, false);
                    selectedList.add(option, undefined);
                    console.log(leafList.options[index].value);
                    console.log(option);
                    leafList.options[index].style.display = 'none';
                }
            }
        };
        // remove selected option
        btnRemove.onclick = (e) => {
            e.preventDefault();
            // save the selected option
            let selected = [];

            for (let i = 0; i < selectedList.options.length; i++) {
                selected[i] = selectedList.options[i].selected;
            }
            // remove all selected option
            let index = selectedList.options.length;
            while (index--) {
                if (selected[index]) {
                    //丟回bracnh or leaf
                    var type, res;
                    if (selectedList.options[index].value.search('leaf_')>=0) {
                        type = 'leaf';
                        res = selectedList.options[index].value.slice(5);
                        const option = new Option(res, res);
                        leafList.add(option, undefined);
                    }else {
                        type = 'branch';
                        res = selectedList.options[index].value.slice(7);
                        const option = new Option(res, res);
                        branchList.add(option, undefined);
                    }
                    console.log(res);
                    console.log(typeof(res));
                    console.log(selectedList.options[index].value);
                    selectedList.remove(index);
                }
            }
        };
        submitBtn.onclick = (e) => {
            for (let i = 0; i < selectedList.options.length; i++) {
                selectedList.options[i].selected = true;
                //console.log(selectedList.options[i].selected);
            }
            $('#myForm').submit();
        };
    </script>

  </body>
</html>
