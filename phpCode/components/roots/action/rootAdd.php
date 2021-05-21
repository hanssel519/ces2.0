<?php
//include classes
$path = $_SERVER['DOCUMENT_ROOT']."/CEStable/includes/autoLoader.inc.php";
include $path;

echo '<pre>'; print_r($_POST); echo '</pre>';

    if (isset($_POST['submit'])) {
    if (isset($_POST['rootName'])) {
        $obj = new Root();
        $obj->addRoot($_COOKIE['projectName'], $_POST['rootName']);
    }

    if (isset($_POST['selectedList'])) {
        foreach ($_POST['selectedList'] as $key => $value) {
            echo $value;
            if(strpos($value, 'leaf_') !== false){
                $leaf = trim($value, 'leaf_');
            } else{
                $branch = trim($value, 'branch_');
            }

        }

    }
}
