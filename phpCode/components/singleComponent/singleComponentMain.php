<?php
$path = $_SERVER['DOCUMENT_ROOT']."/CEStable/includes/autoLoader.inc.php";
include $path;

ECHO "projectName: ".$_GET['projectName'] ." componentid: ".$_GET['componentid'] ." action: ".$_GET['action'];

$singleComponent = new Components();
$singleComponent->singleComponent($_GET['projectName'], $_GET['componentid'], $_GET['action']);
