<?php
$path = $_SERVER['DOCUMENT_ROOT']."/CEStable/includes/autoLoader.inc.php";
include $path;

if(isset($_POST["type"])){
    if($_POST["type"] == "catagory"){
        //list all get_option's subtitle_id (get_option: 'A Cover & Bezel  相關'...)
        $obj = new catagory();
        //$output: php array
        $output = $obj->querySubtitle($_POST['get_option']);
        //echo json_encode($output);

        ob_end_clean();
        echo json_encode($output);
        //[{"name":"sub1","id":"1"},{"name":"sub2","id":"2"}]
    }
    else if($_POST["type"] == "subtitle"){
        //list all get_option's 底下的components names (get_option: subtitle)
        $obj = new catagory();
        //$output: php array
        $output = $obj->queryLeaf($_POST['get_option']);
        ob_end_clean();//clear cache
        echo json_encode($output);
    }
}
?>
