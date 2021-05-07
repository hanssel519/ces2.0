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
    public function queryShow($projectName, $variable=''){
        //parameter is a array
        if(! $this->serverConnect() ){
            die('Could not connect: ' . mysql_error());
        }else {
            $total = array();
            foreach ($variable as $value) {
                //equals to table name
                $tmp = array();
                $sql = "SHOW COLUMNS FROM ".$value.";";
                $stmt = $this->connect($projectName)->query($sql);
                $row = $stmt->fetch();//ignore id
                while ($row = $stmt->fetch()){//THEOMETRICALLY only one match
                    $tmp[$row['Field']] = "單位-todo_list";
                }
                $total[$value] = $tmp;
            }
            return $total;
        }
    }
    public function saveInput($projectName, $material, $items, $inputPost){
        echo "材料: ".$material."<br>";
        foreach ($inputPost as $key => $value) {
            echo "Field ".htmlspecialchars($key)." is ".htmlspecialchars($value)."<br>";
        }
        echo "<hr>結構: ";
        echo '<pre>'; print_r($items); echo '</pre>';
        if(! $this->serverConnect() ){
            die('Could not connect: ' . mysql_error());
        }else {
            //minor components INSERT
            $item_id = array();
            foreach ($items as $item => $value) {
                $string = "";
                $string1 = "";
                foreach ($value as $column => $unit) {
                    //$item=成型, $column=成型_成型種類
                    $string = $string."`".$column."`,";
                    $string1 = $string1."'".$inputPost[$column]."',";

                }
                //刪除最後comma
                $string = substr($string, 0, -1);
                $string1 = substr($string1, 0, -1);

                $sql = "INSERT INTO `".$item."` (". $string . ") VALUES (". $string1 .");";

                $stmt = $this->connect($projectName)->query($sql);

                //抓最後一筆id insert進 big item (plastic, al, gm ...)
                if ($stmt) {
                    $sql = "SELECT id FROM `".$item."`ORDER BY id DESC LIMIT 1;";
                    $get_id = $this->connect($projectName)->query($sql)->fetch();
                    $last_id = $get_id['id'];//string
                    echo "last_id: ";
                    var_dump($last_id);
                    echo "<br>";
                    $item_id[$item] = intval($last_id);
                    /*
                    item_id Array
                    (
                        [成型] => 19
                        [熱熔nut] => 12
                        [濺鍍] => 12
                    )
                    */
                    $string = "";
                    $string1 = "";
                    foreach ($item_id as $column => $id) {
                        //$item=成型, $column=成型_成型種類
                        $string = $string."`".$column."`,";
                        $string1 = $string1."'".$id."',";
                        echo "<br>string: ";
                        var_dump($string);
                        echo "<br>string1: ";
                        var_dump($string1);
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
            $stmt = $this->connect($projectName)->query($sql);
            echo "stmt: ";
            var_dump($stmt);
            echo "<br>";

            echo '<pre>'; print_r($item_id); echo '</pre>';
            if ($stmt) {
                //大item塞給component
                $sql = "SELECT id FROM `".$material."`ORDER BY id DESC LIMIT 1;";
                $get_id = $this->connect($projectName)->query($sql)->fetch();
                $last_id = intval($get_id['id']);//string to int
                echo "大item last_id: ";
                var_dump($last_id);
                echo "<br>";
                $sql = "INSERT INTO `components` (`name`, `material`, `material_id`, `layer`, `remark`) VALUES ('".$inputPost['component_name']."', '".$material."', $last_id, '".$inputPost['layer']."', '".$inputPost['remark']."');";
                echo "sql: ";
                var_dump($sql);
                echo "<br>";
                $stmt = $this->connect($projectName)->query($sql);
                echo "stmt: ";
                var_dump($stmt);
                echo "<br>";
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
