<?php
  //include classes
  $path = $_SERVER['DOCUMENT_ROOT']."/CEStable/includes/autoLoader.inc.php";
  include $path;
  require($_SERVER['DOCUMENT_ROOT']."/CEStable/includes/importLibraries.inc.php");
  //$path = $_SERVER['DOCUMENT_ROOT']."/CEStable/library/phpDebug/ChromePhp.php";
  //include $path;

?>


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
    <?php
        print_r($_COOKIE);
        echo $_COOKIE["projectName"];
        $catagory = array('a cover & bezel 相關', 'lcd_others', 'c cover & d door 相關', 'logic others', 'mb others');
    ?>
        <center>

            <div id="select_box">

                <select name="root" id="root" class="form-select" data-live-search="true"onchange="fetch_select(this.value, 'catagory')">
                    <?php
                    foreach ($catagory as $value) {
                        echo "<option>".$value."</option>";
                    }
                    ?>
                </select>

                <br>
                <!--subtitle branch-->

                <select name="branch" id="branch" class="form-select" data-live-search="true"onchange="fetch_select(this.value, 'subtitle')">
                </select>

                <br>
                <!--leaf components-->
                <select name="leaf" id="leaf" class="form-select" data-live-search="true">
                </select>
            </div>
        </center>

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


      //第一次啥都不選 就呼叫一次
      //fetch_select('catagory');

      function fetch_select(val, level){
          $.ajax({
             method: 'POST',
             url: 'action/ajaxFetch.php',
             data: {
                 get_option:val, type: level
             },
             cache: false,
             dataType:"JSON",
             success: function (response) {
                 var html = '';
                 console.log(response);
                 console.log("\n");
                 console.log(response.length);
                 if (response.length == 1) {
                     html += '<option value="null">you have no options so far</option>';
                 }else {
                     html += '<option value="null">select one below</option>';
                     for(var count = 1; count < response.length; count++){
                         html += '<option value="'+response[count].id+'">'+response[count].name+'</option>';
                     }
                 }
                 if (level == 'catagory') {
                     document.getElementById("branch").innerHTML=html;
                     //$('#branch').html(html);
                     //$('#branch').selectpicker('refresh');
                 }else if (level == 'subtitle') {
                     document.getElementById("leaf").innerHTML=html;
                     //$('#leaf').html(html);
                     //$('#leaf').selectpicker('refresh');
                 }
             },
             error: function(err) {
                 console.log(err);
                 //xhr, ajaxOptions, thrownError
                 /*console.log(xhr.responseText);
                 alert(xhr.status);
                 alert(xhr.readyState);
                 alert(ajaxOptions);
                 alert(thrownError);*/
            }
             //error: function(err){console.log(err)}
         });
     }
        /*$(document).on('change', '#root', function(){
            var value = $('#root').val();
            fetch_select(value, 'catagory');
        });*/
        /*$(document).on('change', '#branch', function(){
            var value = $('#branch').val();
            fetch_select(value, 'subtitle');
        });*/
    </script>

  </body>
</html>
