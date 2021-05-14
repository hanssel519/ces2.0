<?php
//include classes
$path = $_SERVER['DOCUMENT_ROOT']."/CEStable/includes/autoLoader.inc.php";
include $path;
require($_SERVER['DOCUMENT_ROOT']."/CEStable/includes/importLibraries.inc.php");


/*echo $_COOKIE['material'];
foreach ($_POST as $key => $value) {
    echo "Field ".htmlspecialchars($key)." is ".htmlspecialchars($value)."<br>";
}*/


//delete($_POST['componentID']);
$items = unserialize($_POST['items']);
$_POST['items'] = unserialize($_POST['items']);

echo '<pre>'; print_r($items); echo '</pre>';
echo '<pre>'; print_r($_POST); echo '</pre>';
/*echo "<hr>passed_array: ";
echo '<pre>'; print_r($items); echo '</pre>';*/

$obj = new MinorElement();
$obj->saveInput($_COOKIE['projectName'], $_COOKIE['material'], $items, $_POST);

/*foreach ($items as $item => $value) {
    print_r($item);
    echo ", ";
    print_r($value);
    foreach ($value as $column => $unit) {
        //$item=成型, $column=成型_成型種類
        echo $column."<br>";
    }
}*/
/*
$items = Array
(
    [成型] => Array
        (
            [成型_成型種類] => 單位-todo_list
            [成型機台廠牌或種類] => 單位-todo_list
            [成型機台型號或噸數] => 單位-todo_list
            [成型模具穴數] => 單位-todo_list
            [成型秒數] => 單位-todo_list
            [成型良率] => 單位-todo_list
        )

    [熱熔nut] => Array
        (
            [熱熔Nut秒數] => 單位-todo_list
            [熱熔Nut良率] => 單位-todo_list
        )
)
*/
