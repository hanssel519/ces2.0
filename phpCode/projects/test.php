<?php
$big = array(
    'Plastic' => array('塑膠', '漆', 'nut',	'成型', '熱熔nut', '濺鍍', 'cnc', 'vm', '電鍍', '塗裝', '印刷'),
    'MG' => array('塑膠', '鎂鋁', '漆', '冷鍛', '壓鑄', '埋射',	'衝切', '研磨', 'cnc', '皮膜', '塗裝', '加工', '雷雕', '印刷'),
    'AL' => array('塑膠', '鋁', '鋁擠', '髮絲', '衝壓', '埋射', '衝切', '研磨', 'cnc', '噴砂', '陽極', '加工', '蝕刻', '雷雕', '印刷'),
    'Assembly' => array('膠', '點膠', '壓合', '熱熔', '組裝'),
    'Sheet_Metal' => array('鐵件', '漆', 'nut', '銅柱', '衝壓', 'cnc', 'ed', '塗裝', '加工', '蝕刻', '雷雕', '印刷')
);

foreach ($big as $key => $value){
    $str = "";
    $str1 ="";
    foreach ($value as $item) {
        $str .= "`".$item."` INT, ";
        $str1 .= ", FOREIGN KEY (`" . $item ."`) REFERENCES `".$item."` (id)";
    }
    $sql = "CREATE TABLE ". $key ."( ".
        "id INT NOT NULL AUTO_INCREMENT, ".
        $str .
        "submission_date DATE, ".
        "PRIMARY KEY ( id )".
        $str1 .
        "); ";
    echo $sql;
}
