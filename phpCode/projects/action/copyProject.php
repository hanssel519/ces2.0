<?php
//include classes
$path = $_SERVER['DOCUMENT_ROOT']."/CEStable/includes/autoLoader.inc.php";
include $path;

echo '<pre>'; print_r($_POST); echo '</pre>';
echo '<pre>'; print_r($_GET); echo '</pre>';
/*
$_POST(
    [projectName] => 恩亨(新增project name)
    [saveNewProject] =>
)
$_GET(
    [project_id] => 4(欲複製的project id)
    [project_name] => 4dff(欲複製的project name)
)
*/

$obj = new Project();
$res = $obj->checkIfProExist($_POST['projectName']);
echo "res: ".$res.'<hr>';
echo '<pre>'; print_r($res); echo '</pre>';
if ($obj->checkIfProExist($_POST['projectName'])) {
    echo "<script>alert('project name already been used!');
    location.href = '../../index.php';
    </script>";
}else {
    echo "not exist";
    $obj->copyProject($_POST['projectName'], $_GET['project_id'], $_GET['project_name']);
    header("Location:../../index.php");
}
