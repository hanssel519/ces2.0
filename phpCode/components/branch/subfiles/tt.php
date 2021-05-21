<?php
//include classes
$path = $_SERVER['DOCUMENT_ROOT']."/CEStable/includes/autoLoader.inc.php";
include $path;

//return oprions for 熱熔 and 壓合

//echo '<option name="1" value="1">pkvdndnf</option>';

$obj = new Components();
$componentsData = $obj->showAllComponents($_COOKIE['projectName']);

echo '<pre>'; print_r($componentsData); echo '</pre>';

if($componentsData){
    echo "u東西";
    foreach($componentsData as $row){
     $output[] = array(
      'id'  => $row["id"],
      'name'  => $row['name']
     );
    }

}else {
    echo "no 東西";
    $output = array();
}
echo '<pre>'; print_r($componentsData); echo '</pre>';
