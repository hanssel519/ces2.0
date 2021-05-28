<?php
$path = $_SERVER['DOCUMENT_ROOT']."/CEStable/includes/autoLoader.inc.php";
include $path;
require($_SERVER['DOCUMENT_ROOT']."/CEStable/includes/importLibraries.inc.php");

$obj = new Components();
$obj->deleteComponent($_GET['projectName'], $_GET['componentID'], $_GET['componentName']);
echo "<script>deleteSuccess()</script>";
?>

<script language="javascript">
  //alert('delete completed!');
  window.location.href="../showComponents.php?flag=delete"
  window.location.href;
  //window.history.back(-1);
  //window.Reload()
</script>
