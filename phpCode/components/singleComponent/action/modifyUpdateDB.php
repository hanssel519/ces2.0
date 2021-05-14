<?php


$path = $_SERVER['DOCUMENT_ROOT']."/CEStable/includes/autoLoader.inc.php";
include $path;


//if 有flag($_POST['componentID']) ->先delete 舊資料 再新增新資料
if (isset($_POST['info'])) {
    print_r($_POST['info']['componentID']);
    echo "<hr>";
    $obj = new Components();
    $obj->deleteComponent($_POST['info']['projectName'], $_POST['info']['componentID'], $_POST['info']['componentName']);
}

$items = unserialize($_POST['items']);
$_POST['items'] = unserialize($_POST['items']);
$_POST['selections'] = unserialize($_POST['selections']);
$_POST['small_item_for_your_department'] = unserialize($_POST['small_item_for_your_department']);
echo '<pre>'; print_r($_POST); echo '</pre>';

$obj->modifyComponent($_POST);
