<?php
$path = $_SERVER['DOCUMENT_ROOT']."/CEStable/includes/autoLoader.inc.php";
include $path;

/*
echo "projectName: ".$_GET['projectName'];
echo "<br>id: ".$_GET['componentID'];
echo "<br>componentName: ".$_POST['componentName'];*/

$componentName = trim($_POST['componentName']);
echo "<hr>分號: ". strpos($componentName,';');
echo "<hr>單引: ". strpos($componentName,'\'');
echo "<hr>雙引: ". strpos($componentName,'\"');
if((strpos($componentName,';')!==false)||(strpos($componentName,'\'')!==false)||(strpos($componentName,'\"')!==false)){
    //sweetalert -- swal加在這邊會快速消失
    //所以送一個error flag回index.php

    echo "<script>window.location.href = '../../showComponents.php?error=componentNameFormat'</script>";
    exit();
}
$component = new Components();
$component->copyComponent($_GET['projectName'], $_GET['componentID'], $_POST['componentName']);

/*echo $_SERVER['DOCUMENT_ROOT'];*/

header('Location:../../showComponents.php');
