<?php

/**
 *
 */
class MinorElement extends Dbh
{

    function __construct()
    {
        // code...
    }
    //return selections to fillinput.php
    public function queryShow($projectName, $selections=''){
        //parameter is a array
        if(! $this->serverConnect() ){
            die('Could not connect: ' . mysql_error());
        }else {
            $total = array();
            foreach ($selections as $value) {
                //equals to table name
                $tmp = array();
                $sql = "SHOW COLUMNS FROM ".$value.";";
                $stmt = $this->connect($projectName)->query($sql);
                $row = $stmt->fetch();//ignore id
                while ($row = $stmt->fetch()){//THEOMETRICALLY only one match
                    //$tmp[$row['Field']] = "單位-todo_list";
                    if (!strcmp($row['Field'], 'submission_date')) {
                        break;
                    }
                    $row_f = $row['Field'];
                    $sql1 = "SELECT ".$row_f." FROM ".$value." WHERE id = 1;";
                    $stmt1 = $this->connect($projectName)->query($sql1);
                    $row1 = $stmt1->fetch();

                    foreach ($row1 as $key) {
                        if ($key != NULL) {
                            $tmp[$row['Field']] = "(".$key.")";
                        }else{
                            $tmp[$row['Field']] = "";
                        }

                    }
                }
                $total[$value] = $tmp;
            }
            return $total;
        }
    }
    public function placeholder($projectName, $table, $id, $columnName){
        if(! $this->serverConnect() ){
            die('Could not connect: ' . mysql_error());
        }else {
            $sql = "SELECT ".$columnName." FROM ".$table." WHERE id = ".$id.";";
            $stmt = $this->connect($projectName)->query($sql)->fetch();
            //print_r($stmt);
            return $stmt[$columnName];
        }
    }
    public function getID($projectName, $componentID, $smallItemName){
        if(! $this->serverConnect() ){
            die('Could not connect: ' . mysql_error());
        }else {
            $sql = "SELECT material, material_id FROM components WHERE id = ".$componentID.";";
            $stmt = $this->connect($projectName)->query($sql)->fetch();
            //print_r($stmt);
            $sql = "SELECT ".$smallItemName." FROM ". $stmt['material']." WHERE id = ".$stmt['material_id'].";";
            $stmt = $this->connect($projectName)->query($sql)->fetch();
            //$stmt['smallItemName'] = 塑膠的id...
            return $stmt[$smallItemName];
        }
    }
    public function saveInput($projectName, $material, $items, $inputPost){
        echo "材料: ".$material."<br>";
        foreach ($inputPost as $key => $value) {
            //echo "Field ".htmlspecialchars($key)." is ".htmlspecialchars($value)."<br>";
        }
        echo "<hr>結構: ";
        //echo '<pre>'; print_r($items); echo '</pre>';
        if(! $this->serverConnect() ){
            die('Could not connect: ' . mysql_error());
        }else {
            //minor components INSERT
            $item_id = array();
            foreach ($items as $item => $value) {
                $string = "";
                $string1 = "";
                $new_data = array();
                foreach ($value as $column => $unit) {
                    //$item=成型, $column=成型_成型種類
                    $string = $string."`".$column."`,";
                    //$string1 = $string1."'".$inputPost[$column]."',";
                    $string1 = $string1."?,";
                    array_push($new_data, $inputPost[$column]);
                }
                //刪除最後comma
                $string = substr($string, 0, -1);
                $string1 = substr($string1, 0, -1);

                echo '<pre>'; print_r($new_data); echo '</pre>';
                $sql = "INSERT INTO `".$item."` (". $string . ") VALUES (". $string1 .");";
                $stmt =  $this->connect($projectName)->prepare($sql);
                $stmt->execute($new_data);
                echo "<hr>".$sql;
                //$stmt = $this->connect($projectName)->query($sql);

                //抓最後一筆id insert進 big item (plastic, al, gm ...)
                if ($stmt) {
                    $sql = "SELECT id FROM `".$item."`ORDER BY id DESC LIMIT 1;";
                    $get_id = $this->connect($projectName)->query($sql)->fetch();
                    $last_id = $get_id['id'];//string

                    $item_id[$item] = intval($last_id);
                    echo "<hr>".$sql;
                    /*
                    item_id Array
                    (
                        [成型] => 19
                        [熱熔nut] => 12
                        [濺鍍] => 12
                    )
                    */
                    //位置怪怪的
                    $string = "";
                    $string1 = "";
                    $new_id = array();
                    foreach ($item_id as $column => $id) {
                        //$item=成型, $column=成型_成型種類
                        $string = $string."`".$column."`,";
                        //$string1 = $string1."'".$id."',";
                        $string1 = $string1."?,";
                        array_push($new_id, $id);
                    }
                    //刪除最後comma
                    $string = substr($string, 0, -1);
                    $string1 = substr($string1, 0, -1);

                } else {
                    echo "多個小items build failed";
                    echo "Error: " . $sql . "<br>" . $stmt->error;
                }
            }
            $sql = "INSERT INTO `".$material."` (". $string . ") VALUES (". $string1 .");";
            $stmt =  $this->connect($projectName)->prepare($sql);
            $count = $stmt->execute($new_id);
            echo "<hr>".$sql;
            if ($stmt) {
                //大item塞給component
                $sql = "SELECT id FROM `".$material."`ORDER BY id DESC LIMIT 1;";
                $get_id = $this->connect($projectName)->query($sql)->fetch();
                $last_id = intval($get_id['id']);//string to int
                echo "<hr>".$sql;
                $sql = "INSERT INTO `components` (`name`, `material`, `material_id`, `layer`, `supplier`, `amount`, `remark`) VALUES (?, ?, ?, ?, ?, ?, ?);";
                $stmt = $this->connect($projectName)->prepare($sql);
                $count = $stmt->execute(array($inputPost['component_name'], $material, $last_id, $inputPost['layer'], $inputPost['supplier'], $inputPost['amount'],$inputPost['remark']));

                //綁定到component成功!!redirect to show components
                //components/action/fillInputAction.php=>showComponents.php
                header("Location: ../showComponents.php");
            }else {
                echo "小items塞大items(material)failed";
                echo "Error: " . $sql . "<br>" . $stmt->error;
            }
        }
    }
}
