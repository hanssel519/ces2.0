<?php
/**
 *
 */
class Components extends Dbh
{
    private $big_item = array(
        'Plastic' => array('塑膠', '漆', 'nut', '成型', '熱熔nut', '濺鍍', 'cnc', 'vm', '電鍍', '塗裝', '印刷'),
        'MG' => array('塑膠', '鎂鋁', '漆', '冷鍛', '壓鑄', '埋射', '衝切', '研磨', 'cnc', '皮膜', '塗裝', '加工', '雷雕', '印刷'),
        'AL' => array('塑膠', '鋁', '鋁擠', '髮絲', '衝壓', '埋射', '衝切', '研磨', 'cnc', '噴砂', '陽極', '加工', '蝕刻', '雷雕', '印刷'),
        'Assembly' => array('膠', '點膠', '壓合', '熱熔', '組裝'),
        'Sheet_Metal' => array('鐵件', '漆', 'nut', '銅柱', '衝壓', 'cnc', 'ed', '塗裝', '加工', '蝕刻', '雷雕', '印刷')
    );
    private $sql_array = array(
        "INSERT INTO `塑膠` (`重量1`, `重量2`) VALUES ('克(含料頭)', '克(含料頭)');",
        "INSERT INTO `漆` (`塗裝件數`) VALUES ('片/KG');",
        "INSERT INTO `Nut` (`Nut用量`) VALUES ('PC');",
        "INSERT INTO `成型` (`成型_成型種類`,`成型模具穴數`,`成型秒數`) VALUES
        ('RHCM/HTM/後段噴漆/一般咬花/特殊咬花','一模幾穴','秒');",
        "INSERT INTO `熱熔Nut` (`熱熔Nut秒數`) VALUES ('秒');",
        "INSERT INTO `濺鍍` (`濺鍍良率`) VALUES ('百分比');",
        "INSERT INTO `CNC` (`CNC工程種類`,`CNC秒數`) VALUES ('參照設計','秒');",
        "INSERT INTO `VM` (`VM載具產出`,`VM時數`) VALUES ('件','小時');",
        "INSERT INTO `電鍍` (`電鍍載具產出`,`電鍍時數`) VALUES ('件','小時');",
        "INSERT INTO `塗裝` (`塗裝工程名稱`,`塗裝載具產出`,`塗裝秒數`) VALUES
        ('參照設計','件','秒');",
        "INSERT INTO `印刷` (`印刷項目`) VALUES ('參照設計');"
    );
    function __construct()
    {
        // code...
    }
    //showComponents.php 列出所有components
    public function showAllComponents($projectName=''){
        if(! $this->serverConnect() ){
            die('Could not connect: ' . mysql_error());
        }else {

                //equals to table name
                $tmp = array();
                $total = array();
                $sql = "SELECT * FROM `components`;";
                $stmt = $this->connect($projectName)->query($sql);

                /*$FLAG = 1;//紀錄到底了沒
                $exists = 0;//紀錄有無 components
                while ($FLAG) {
                    if ($row = $stmt->fetch()) {
                        $exists = 1;
                        $tmp['name'] = $row['name'];
                        $tmp['material'] = $row['material'];
                        $tmp['remark'] = $row['remark'];
                        $tmp['submission_date'] = $row['submission_date'];
                        array_push($total, $tmp);
                    }else {//fetch不到就跳出去
                        $FLAG = 0;
                    }
                }
                if (!$exists) {//沒有componemts
                    echo "尚無components";
                    return;
                }else {

                }
                return $total;*/

                while ($row = $stmt->fetch()){//THEOMETRICALLY only one match
                    $tmp['id'] = $row['id'];
                    $tmp['name'] = $row['name'];
                    $tmp['material'] = $row['material'];
                    $tmp['remark'] = $row['remark'];
                    $tmp['submission_date'] = $row['submission_date'];
                    array_push($total, $tmp);
                    //echo $row['name']." ". $row['material']." ".$row['remark']." ".$row['submission_date']."<hr>";
                }
                return $total;
        }
    }

    //copy component
    public function copyComponent($projectName, $componentID, $componentName){
        if(! $this->serverConnect() ){
            die('Could not connect: ' . mysql_error());
        }else {
            //`id`, `name`, `material`, `material_id`, `layer`, `remark`, `submission_date`
            //用$componentID抓 component的材料跟材料id====================
            $sql = "SELECT material, material_id FROM `components` WHERE id = ".$componentID.";";
            $material = $this->connect($projectName)->query($sql)->fetch();
            echo $material['material'].$material['material_id'];
            echo '<pre>'; print_r($this->big_item[$material['material']]); echo '</pre>';
            //big_item=材料的columns, ex: 塑膠, 鋁, 鋁擠, 髮絲, 衝壓...
            $small_items = implode(", ", $this->big_item[$material['material']]);
            echo $small_items;
            //對材料(plastic, al...)找 small_item的id====================
            //"SELECT 塑膠, 鋁, 鋁擠, 髮絲, 衝壓... FROM `AL` WHERE id = 2"
            $sql = "SELECT ".$small_items." FROM `".$material['material']."` WHERE id = ".$material['material_id'];
            echo "<br>";
            var_dump($sql);
            $small_item_withID = $this->connect($projectName)->query($sql)->fetch();
            /*$small_item
            (
                [塑膠] => 6
                [鋁] => 2
                [鋁擠] =>
                [髮絲] =>
            )*/
            echo '<pre>$small_item_withID'; print_r($small_item_withID); echo '</pre>';

            $small_item_newID = array();
            foreach ($small_item_withID as $small_item_name => $small_item_id) {
                if ($small_item_id) {  //小材料有填值
                    //[塑膠] => 6, [鋁] => 2, [鋁擠] =>n/a, [髮絲] =>n/a
                    //$small_item_name = [塑膠], $small_item_id = 6
                    //對 $small_item找columns
                    $sql = "SHOW COLUMNS FROM `".$small_item_name."`;";
                    $column_name = $this->connect($projectName)->query($sql)->fetchAll();
                    echo "<br><br>columns: ". $small_item_name .$small_item_id;
                    //echo '<pre>'; print_r($column_name); echo '</pre>';
                    /*
                    column_name:
                    Array
                    (
                        [0] => Array(
                                [Field] => id
                                [Type] => int(10)
                            )
                        [1] => Array(
                                [Field] => 塑料名稱1
                                [Type] => varchar(500)
                                [Null] => YES
                            )
                    )
                    */
                    $tmp = array();
                    foreach ($column_name as $redundant => $value) {//$value['Field']接起來
                        echo '<pre>'; print_r($value['Field']); echo '</pre>';
                        if (strcmp($value['Field'], "id")&&strcmp($value['Field'], "submission_date")!== 0){//收集 小item的column names, except: id+submission_date
                            array_push($tmp, $value['Field']);
                        }
                    }
                    /*
                    tmp: Array
                    (
                        [0] => 塑料名稱1
                        [1] => 重量1
                        [2] => 塑料名稱2
                        [3] => 重量2
                    )
                    */
                    echo '<pre>tmp: '; print_r($tmp); echo '</pre>';
                    $small_item_columns = implode(", ", $tmp);
                    echo '<pre>small_item_columns: '; print_r($small_item_columns); echo '</pre>';
                    //small_item_columns: 塑料名稱1, 重量1, 塑料名稱2, 重量2
                    echo '<pre>$small_item_name: '; print_r($small_item_name); echo '</pre>';
                    //$small_item_name: 塑膠
                    //建立新的 $small_item 資料, ex:塑膠: 塑料名稱1, 重量1, 塑料名稱2... ====================
                    $sql = "INSERT INTO `".$small_item_name."` (". $small_item_columns .") SELECT ".$small_item_columns ." FROM `".$small_item_name ."` WHERE id = ".$small_item_id .";";
                    var_dump($sql);
                    $column_name = $this->connect($projectName)->query($sql);
                    //get return 新建立的 $small_item(塑膠) 的id for dig_item(Plastic)
                    $sql = "SELECT id FROM `".$small_item_name."`ORDER BY id DESC LIMIT 1;";
                    $id = $this->connect($projectName)->query($sql)->fetch();
                    $small_item_newID[$small_item_name] = $id['id'];
                }
            }
            //新建立的$small_item_newID 分成item名稱+id 兩個array
            echo '<pre>$small_item_newID: '; print_r($small_item_newID); echo '</pre>';
            $items = array();
            $ids = array();
            foreach ($small_item_newID as $small_item => $id) {
                array_push($items, $small_item);
                array_push($ids, $id);
            }
            $items = implode(", ", $items);
            $ids = implode(", ", $ids);
            echo '<pre>$items: '; print_r($items); echo '</pre>';
            echo '<pre>$ids: '; print_r($ids); echo '</pre>';
            //把$small_item(塑膠)的新id填進big_item(plastic)
            $sql = "INSERT INTO ".$material['material']." (".$items.") VALUES (".$ids.")";
            $this->connect($projectName)->query($sql);

            //insert to `component`====================
            //複製component的部分值
            $sql = "INSERT INTO `components` (`material`, `layer`, `supplier`, `amount`, `remark`) SELECT material, layer, supplier, amount, remark FROM `components` WHERE id=".$componentID.";";

            $stmt = $this->connect($projectName)->query($sql);
            echo "<hr>複製component的部分值";
            var_dump($sql);
            echo "<hr>複製component的部分值";
            var_dump($stmt);
            //抓出component對應的material的最後一筆id
            $sql = "SELECT id FROM `".$material['material']."` ORDER BY id DESC LIMIT 1;";
            $id = $this->connect($projectName)->query($sql)->fetch();
            $material_id = $id['id'];
            //抓出剛剛複製的component的id
            $sql = "SELECT id FROM `components` ORDER BY id DESC LIMIT 1;";
            $id = $this->connect($projectName)->query($sql)->fetch();
            $component_lastid = $id['id'];
            //把最後一筆 material_id 補進 component的最後一筆
            $sql = "UPDATE `components` SET material_id = ".$material_id.", name = '".$componentName."' WHERE id = ".$component_lastid.";";
            $stmt = $this->connect($projectName)->query($sql);
            echo "<hr>把最後一筆 material_id 補進 component的最後一筆";
            var_dump($sql);
            echo "<hr>把最後一筆 material_id 補進 component的最後一筆";
            var_dump($stmt);
            return;
            //header('Location:../phpCode/components/showComponents.php');
        }
    }
    //check component
    public function ceckComponent($projectName, $componentID){
        if(! $this->serverConnect() ){
            die('Could not connect: ' . mysql_error());
        }else {
            //`id`, `name`, `material`, `material_id`, `layer`, `remark`, `submission_date`
            $total_item = array();
            $sql = "SELECT layer, supplier, amount, remark FROM `components` WHERE id = ".$componentID.";";

            $details = $this->connect($projectName)->query($sql)->fetch();

            $total_item['info'] = $details;
            //檢查一下data passing gkosdjkdnv

            //用$componentID抓 component的材料跟材料id====================
            $sql = "SELECT material, material_id FROM `components` WHERE id = $componentID";
            $material = $this->connect($projectName)->query($sql)->fetch();

            //big_item=材料的columns, ex: 塑膠, 鋁, 鋁擠, 髮絲, 衝壓...
            $small_items = implode(", ", $this->big_item[$material['material']]);

            //對材料(plastic, al...)找 small_item的id====================
            //"SELECT 塑膠, 鋁, 鋁擠, 髮絲, 衝壓... FROM `AL` WHERE id = 2"
            $sql = "SELECT ".$small_items." FROM `".$material['material']."` WHERE id = ".$material['material_id'];

            $small_item_withID = $this->connect($projectName)->query($sql)->fetch();
            /*$small_item
            (
                [塑膠] => 6
                [鋁] => 2
                [鋁擠] =>
                [髮絲] =>
            )*/


            foreach ($small_item_withID as $small_item_name => $small_item_id) {
                if ($small_item_id) {  //小材料有填值
                    //[塑膠] => 6, [鋁] => 2, [鋁擠] =>n/a, [髮絲] =>n/a
                    //$small_item_name = [塑膠], $small_item_id = 6
                    //對 $small_item找columns
                    $sql = "SHOW COLUMNS FROM `".$small_item_name."`;";
                    $column_name = $this->connect($projectName)->query($sql)->fetchAll();
                    /*
                    column_name:
                    Array
                    (
                        [0] => Array(
                                [Field] => id
                                [Type] => int(10)
                            )
                        [1] => Array(
                                [Field] => 塑料名稱1
                                [Type] => varchar(500)
                                [Null] => YES
                            )
                    )
                    */
                    $tmp = array();
                    foreach ($column_name as $redundant => $value) {//$value['Field']接起來
                        if (strcmp($value['Field'], "id")&&strcmp($value['Field'], "submission_date")!== 0){//收集 小item的column names, except: id+submission_date
                            array_push($tmp, $value['Field']);
                        }
                    }
                    /*
                    tmp: Array
                    (
                        [0] => 塑料名稱1
                        [1] => 重量1
                        [2] => 塑料名稱2
                        [3] => 重量2
                    )
                    */
                    $small_item_columns = implode(", ", $tmp);
                    //small_item_columns: 塑料名稱1, 重量1, 塑料名稱2, 重量2

                    //$small_item_name: 塑膠
                    //建立新的 $small_item 資料, ex:塑膠: 塑料名稱1, 重量1, 塑料名稱2... ====================
                    $sql = "SELECT ".$small_item_columns ." FROM `".$small_item_name ."` WHERE id = ".$small_item_id .";";

                    $small_item_data = $this->connect($projectName)->query($sql)->fetch();
                    $total_item[$small_item_name] = $small_item_data;
                    //get return 新建立的 $small_item(塑膠) 的id for dig_item(Plastic)

                }
            }
            /*
            $total_item: Array
            (
                [塑膠] => Array(
                        [塑料名稱1] => plastic1
                        [重量1] => 2g
                    )

                [鋁] => Array(
                        [鋁長] => 3 cm
                        [鋁寬] => 3cm
                    )
            )
            */

            return $total_item;

        }
    }

    //
    public function getSelectedBigItem($projectName, $componentID, $componentName){
        if(! $this->serverConnect() ){
            die('Could not connect: ' . mysql_error());
        }else {
            //用$componentID抓 component的材料跟材料id====================
            $sql = "SELECT material, material_id FROM `components` WHERE id = $componentID;";
            $material = $this->connect($projectName)->query($sql)->fetch();
            //big_item=材料的columns, ex: 塑膠, 鋁, 鋁擠, 髮絲, 衝壓...
            $small_items = implode(", ", $this->big_item[$material['material']]);
            //對材料(plastic, al...)找 small_item的id====================
            //"SELECT 塑膠, 鋁, 鋁擠, 髮絲, 衝壓... FROM `AL` WHERE id = 2"
            $sql = "SELECT ".$small_items." FROM `".$material['material']."` WHERE id = ".$material['material_id'];
            echo "<br>";
            var_dump($sql);
            $small_item_withID = $this->connect($projectName)->query($sql)->fetch();
            /*$small_item
            (
                [塑膠] => 6
                [鋁] => 2
                [鋁擠] =>
                [髮絲] =>
            )*/
            $tmp = array();
            $tmp['info'] = array(
                'projectName' => $projectName,
                'componentID' => $componentID,
                'componentName' => $componentName,
                'material' => $material['material']
            );
            $tmp['small_item_include'] = array();
            foreach ($small_item_withID as $key => $value) {
                if ($value) {
                    $tmp1 = array($key => 1);
                    $tmp['small_item_include'] = $tmp['small_item_include']+$tmp1;
                    //array_push($tmp['with'][$key], 1);
                }else {
                    $tmp1 = array($key => 0);
                    $tmp['small_item_include'] = $tmp['small_item_include']+$tmp1;
                    //array_push($tmp['without'][$key],  0);
                }
            }
            echo '<pre>'; print_r($tmp); echo '</pre>';
            return $tmp;
            /*
            $tmp(
                [with] => Array
                    (
                        [0] => 塑膠
                        [1] => 鋁
                    )

                [without] => Array
                    (
                        [0] => 鋁擠
                        [1] => 髮絲
                        [2] => 衝壓
                        [3] => 埋射
                        [4] => 衝切...
                    )
            )
            */
        }
    }

    //modify component
    public function modifyComponent($obj){
        //echo '<pre>'; print_r($obj); echo '</pre>';
        if(! $this->serverConnect() ){
            die('Could not connect: ' . mysql_error());
        }else {
            //`id`, `name`, `material`, `material_id`, `layer`, `remark`, `submission_date`


            $sql = "UPDATE components SET `name` = ?, `layer` = ?, `supplier` = ?, `amount` = ?, `remark` = ? WHERE id = ".$obj['componentID'].";";
            $sth = $this->connect($obj['info']['projectName'])->prepare($sql);
            $sth->execute(array($obj['component_name'], $obj['layer'], $obj['supplier'], $obj['amount'], $obj['remark']));

            echo "<hr>update component: ".$sql;
            //$material = $this->connect($obj['info']['projectName'])->query($sql)->fetch();
            //用$componentID抓 component的材料跟材料id====================
            $sql = "SELECT material, material_id FROM `components` WHERE id = ".$obj['componentID'].";";
            $material = $this->connect($obj['info']['projectName'])->query($sql)->fetch();
            echo "<hr>material: ".$material['material'].", material_id: ".$material['material_id'];

            if ($material) {//刪除小資料 SELECT * FROM `plastic` WHERE id =2
                $sql = "SELECT * FROM `".$material['material']."` WHERE id = ".$material['material_id'].";";
                $small_items = $this->connect($obj['info']['projectName'])->query($sql)->fetch();
                //echo '<hr>未更新前的material data: <pre>'; print_r($small_items); echo '</pre>';
                //$small_items['塑膠']=2
                //$obj['small_item_for_your_department']
                foreach ($obj['small_item_for_your_department'] as $small_item_content => $redundant) {
                    //$small_item_content = '塑膠', '漆', 'nut', '成型', '熱熔nut'...
                    if ($small_items[$small_item_content]) {
                        $sql = "DELETE FROM `".$small_item_content."` WHERE id = ".$small_items[$small_item_content].";";
                        //echo "<hr>刪除material中對應的小item id項目: ".$sql;
                        $checkIfSmallItemDeleteSuccess = $this->connect($obj['info']['projectName'])->query($sql);
                    }
                }
                $selections = array();
                foreach ($this->big_item[$material['material']] as $value) {
                    //echo "<br>".$value;
                    $selections[$value] = 0;
                }
                foreach ($obj['selections'] as $key => $value) {
                    $selections[$value] = 1;
                }
                $item_id = array();

                foreach ($selections as $small_item => $if_selected) {
                    // as [鐵件] => 1
                    if ($obj['small_item_for_your_department'][$small_item]){
                        if ($if_selected) {
                            $string = "";
                            $string1 = "";
                            $new_data = array();
                            foreach ($obj['items'][$small_item] as $key => $value) {
                                //as [鐵件長] => (下料尺寸mm)
                                $string = $string."`".$key."`,";
                                //$string1 = $string1."'".$obj[$key]."',";
                                $string1 = $string1."?,";
                                array_push($new_data, $obj[$key]);
                            }
                            $string = substr($string, 0, -1);
                            $string1 = substr($string1, 0, -1);

                            $sql = "INSERT INTO `".$small_item."` (". $string . ") VALUES (". $string1 .");";
                            $stmt =  $this->connect($obj['info']['projectName'])->prepare($sql);
                            $stmt->execute($new_data);
                            //echo '<pre>'; print_r($new_data); echo '</pre>';

                            //echo "<hr>加入material中對應的小item的新項目: ".$sql;
                            //$stmt = $this->connect($obj['info']['projectName'])->query($sql);
                            if ($stmt) {
                                $sql = "SELECT id FROM `".$small_item."`ORDER BY id DESC LIMIT 1;";
                                $get_id = $this->connect($obj['info']['projectName'])->query($sql)->fetch();
                                $last_id = $get_id['id'];//string

                                $item_id[$small_item] = intval($last_id);

                            } else {
                                echo "多個小items build failed";
                                echo "Error: " . $sql . "<br>" . $stmt->error;
                            }
                        }else {
                            $item_id[$small_item] = NULL;
                        }
                    }
                }
                $str = "";
                $new_id = array();
                //echo '小item新增的id: <pre>'; print_r($item_id); echo '</pre>';
                foreach ($item_id as $column => $id) {
                    //$item=成型, $column=成型_成型種類
                    $str = $str."`".$column."`"."=?,";
                    if ($id) {
                        //$str = $str."`".$column."`"."='".$id."',";
                        array_push($new_id, $id);
                    }else {
                        //$str = $str."`".$column."`"."= NULL,";
                        array_push($new_id, NULL);
                    }
                }
                //刪除最後comma
                $str = substr($str, 0, -1);
                //echo "<hr>update material 中的更新項目: ".$str;
                //echo "<br>還沒給sql";
                $sql = "UPDATE ".$material['material']." SET ".$str." WHERE id = ".$material["material_id"].";";
                $stmt =  $this->connect($obj['info']['projectName'])->prepare($sql);
                $count = $stmt->execute($new_id);
                //echo '<pre>'; print_r($new_id); echo '</pre>';
                //echo "<hr>更新material的內容: ".$sql;
                //print_r($stmt);
                //$stmt = $this->connect($obj['info']['projectName'])->query($sql);

                $sql = "SELECT * FROM `".$material['material']."` WHERE id = ".$material['material_id'].";";
                $small_items = $this->connect($obj['info']['projectName'])->query($sql)->fetch();
                header('Location:../../showComponents.php');
            }
        }

    }

    //delete component
    public function deleteComponent($projectName, $componentID, $componentName){
        // code...
    }
    //個別component修改 redundant
    public function singleComponent($projectName, $componentid, $action){
        switch ($action) {
            case "check"://查看detail
              echo "check!";
              header('Location:singleComponentCheck.php?projectName='.$projectName.'&componentID'.$componentID);
              break;

           case "delete"://直接刪除
             echo "delete!";

             break;
           case "modify"://load出舊資料
             echo "modify!";
             header('Location:singleComponentModify.php?projectName='.$projectName.'&componentID'.$componentID);
             break;
           default:
             echo "wy do u want!";
        }
    }
}
