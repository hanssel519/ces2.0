<?php
//include classes
$path = $_SERVER['DOCUMENT_ROOT']."/CEStable/includes/autoLoader.inc.php";
include $path;

//return oprions for 熱熔 and 壓合

//echo '<option name="1" value="1">pkvdndnf</option>';

$obj = new Components();
$componentsData = $obj->showAllComponents($_COOKIE['projectName']);

if($componentsData){
    foreach($componentsData as $row){
     $output[] = array(
      'id'  => $row["id"],
      'name'  => $row['name']
     );
    }
}else {
    $output = array();
}

//echo '<pre>'; print_r($output); echo '</pre>';
ob_end_clean();
echo json_encode($output);
