<?php


$path = $_SERVER['DOCUMENT_ROOT']."/CEStable/includes/autoLoader.inc.php";
include $path;


//if 有flag($_POST['componentID']) ->先delete 舊資料 再新增新資料
if (isset($_POST['info'])) {
    print_r($_POST['info']['componentID']);
    echo "<hr>";
}

$items = unserialize($_POST['items']);
$_POST['items'] = unserialize($_POST['items']);
$_POST['selections'] = unserialize($_POST['selections']);
$_POST['small_item_for_your_department'] = unserialize($_POST['small_item_for_your_department']);
echo '<pre>'; print_r($_POST); echo '</pre>';

$obj = new Components();
$component_serial_num = $obj->getSerialNum($_POST['info']['projectName'], $_POST['info']['componentID']);
//compare db: serial_number with cookie:serial_number
if ($component_serial_num !== $_COOKIE['serial_number']) {
    //不相同 則 有人更動過 則 不得更動
    header("Location: ../../showComponents.php?error=multiEdition");
}else {
    if($obj->modifyComponent($_POST)){
        $obj->setSerialNum($_POST['info']['projectName'], $_POST['info']['componentID']);
    }
}
