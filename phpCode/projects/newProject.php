<?php
  //include classes
  $path = $_SERVER['DOCUMENT_ROOT']."/CEStable/includes/autoLoader.inc.php";
  include $path;
  require($_SERVER['DOCUMENT_ROOT']."/CEStable/includes/importLibraries.inc.php");
?>
    <link rel="stylesheet" href="/CEStable/resources/css/uploadFile.css">

    <title>New Project!</title>
  </head>
  <body>

<?php
  require('../../includes/template/header.php');
?>


<!--檔案上傳-->
<div class="container center">
	<div class="row">
		<div class="col-md-12">
			<h1 class="white pt-5 pd-2">File Upload</h1>
			<p class="white">Excel file name would be the project name.</p>
		</div>
	</div>

	<form name="upload" method="post" action="uploadFileAction.php" enctype="multipart/form-data" accept-charset="utf-8">
		<div class="row">
			<div class="col-md-12 col-md-offset-3 center">
				<div class="btn-container">
					<!--the three icons: default, ok file (img), error file (not an img)-->
					<h1 class="imgupload"><i class="fas fa-file-upload"></i></i></h1>
					<h1 class="imgupload ok"><i class="fas fa-check"></i></i></h1>
					<h1 class="imgupload stop"><i class="fa fa-times"></i></h1>
					<!--this field changes dinamically displaying the filename we are trying to upload-->
					<p id="namefile">Only excel allowed! (jpg,jpeg,bmp,png)</p>
					<!--our custom btn which which stays under the actual one-->
					<button type="button" id="btnup" class="btn btn-primary btn-lg" onclick="$('#fileup').trigger( 'click' )">select your file!</button>
					<!--this is the actual file input, is set with opacity=0 beacause we wanna see our custom one-->

					<input type="file" value="" name="fileup" id="fileup">

				</div>
			</div>
		</div>
			<!--additional fields-->
		<div class="row">
			<div class="col-md-12">
				<!--the defauld disabled btn and the actual one shown only if the three fields are valid-->
				<input type="submit" value="submit!" class="btn btn-primary" name="submitbtn" id="submitbtn">
				<button type="button" class="btn btn-default" disabled="disabled" name="fakebtn" id="fakebtn">Submit! <i class="fas fa-ban"></i></button>
			</div>
		</div>
	</form>
</div>


<?php
  include_once('../../includes/template/footer.html');
?>


  <!-- Option 1: Bootstrap Bundle with Popper -->
  <script src="/CEStable/library/bootstrap-5.0.0-beta3/dist/js/bootstrap.bundle.min.js" integrity="sha384-JEW9xMcG8R+pH31jmWH6WWP0WintQrMb4s7ZOdauHnUtxwoG2vI5DkLtS3qm9Ekf" crossorigin="anonymous"></script>

  <!--要怎麼搬出去呢?-->
  <script type="text/javascript">
    $('#fileup').change(function(){
    //here we take the file extension and set an array of valid extensions
      var res=$('#fileup').val();
      var arr = res.split("\\");
      var filename=arr.slice(-1)[0];
      filextension=filename.split(".");
      filext="."+filextension.slice(-1)[0];
      valid=[".xlsx",".jpg",".png",".jpeg",".bmp"];
    //if file is not valid we show the error icon, the red alert, and hide the submit button
      if (valid.indexOf(filext.toLowerCase())==-1){
          $( ".imgupload" ).hide("slow");
          $( ".imgupload.ok" ).hide("slow");
          $( ".imgupload.stop" ).show("slow");

          $('#namefile').css({"color":"red","font-weight":700});
          $('#namefile').html("File "+filename+" is not .xlsx!");

          $( "#submitbtn" ).hide();
          $( "#fakebtn" ).show();
      }else{
          //if file is valid we show the green alert and show the valid submit
          $( ".imgupload" ).hide("slow");
          $( ".imgupload.stop" ).hide("slow");
          $( ".imgupload.ok" ).show("slow");

          $('#namefile').css({"color":"green","font-weight":700});
          $('#namefile').html(filename);

          $( "#submitbtn" ).show();
          $( "#fakebtn" ).hide();
      }
    });
  </script>

  </body>
</html>
