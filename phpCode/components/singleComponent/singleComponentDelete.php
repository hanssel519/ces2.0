<?php

$path = $_SERVER['DOCUMENT_ROOT']."/CEStable/includes/autoLoader.inc.php";
include $path;


$obj = new Components();
$obj->deleteComponent($_GET['projectName'], $_GET['componentID'], $_GET['componentName']);
