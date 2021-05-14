<?php
$path = $_SERVER['DOCUMENT_ROOT']."/CEStable/includes/autoLoader.inc.php";
include $path;

/*
echo "projectName: ".$_GET['projectName'];
echo "<br>id: ".$_GET['componentID'];
echo "<br>componentName: ".$_POST['componentName'];*/
$component = new Components();
$component->copyComponent($_GET['projectName'], $_GET['componentID'], $_POST['componentName']);

/*echo $_SERVER['DOCUMENT_ROOT'];*/

header('Location:../../showComponents.php');
