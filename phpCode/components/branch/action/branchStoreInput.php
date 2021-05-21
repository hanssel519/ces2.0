<?php
//include classes
$path = $_SERVER['DOCUMENT_ROOT']."/CEStable/includes/autoLoader.inc.php";
include $path;
require($_SERVER['DOCUMENT_ROOT']."/CEStable/includes/importLibraries.inc.php");


echo '<pre>'; print_r($_COOKIE); echo '</pre>';
/*
$_COOKIE
(
    [projectName] => 6
    [material] => AL //redundant
)
*/

/*
$items
(
    [壓合] => Array
        (
            [壓合子件名稱] =>
            [壓合機台廠牌] =>
            [壓合機台型號] =>
            [壓合秒數] => (參照設計)
            [壓合良率] =>
        )

    [熱熔] => Array
        (
            [熱熔子件名稱] =>
            [熱熔機台廠牌] =>
            [熱熔機台型號] =>
            [熱熔秒數] => (參照設計)
            [熱熔良率] =>
        )

)
$_POST
(
    [component_name] => assembly
    [layer] => option
    [supplier] => 供應個屁
    [amount] => 3
    [壓合子件名稱] => 壓啥
    [壓合機台廠牌] => 不知
    [壓合機台型號] => 123
    [壓合秒數] => 2s
    [壓合良率] => 0%
    [熱熔子件名稱] => 熱熔子件名稱
    [熱熔機台廠牌] => 熱熔機台廠牌
    [熱熔機台型號] => 熱熔機台型號
    [熱熔秒數] => 熱熔秒數(參照設計)
    [熱熔良率] => 0%
    [remark] => 備註要寫啥?????@@@;;""
    [submitBtn] =>
)
*/

$items = unserialize($_POST['items']);
$_POST['items'] = unserialize($_POST['items']);
unset($_POST['items']);
echo '<pre>'; print_r($items); echo '</pre>';
echo '<pre>'; print_r($_POST); echo '</pre>';
/*echo "<hr>passed_array: ";
echo '<pre>'; print_r($items); echo '</pre>';*/

$obj = new branch();
$obj->addBranch($_COOKIE['projectName'], $items, $_POST);
