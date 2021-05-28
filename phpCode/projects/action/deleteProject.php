<?php
//include classes
$path = $_SERVER['DOCUMENT_ROOT']."/CEStable/includes/autoLoader.inc.php";
include $path;

echo '<pre>'; print_r($_GET); echo '</pre>';


$obj = new Project();
$res = $obj->deleteProject($_GET['id'], $_GET['name']);

header("Location:../../index.php");
