<?php
/**
 *
 */
 $path = $_SERVER['DOCUMENT_ROOT']."/CEStable/library/phpDebug/ChromePhp.php";
 include $path;

class Initial extends Dbh
{
    private $catagory = array('A Cover & Bezel 相關', 'LCD_OTHERS', 'C cover & D door 相關', 'Logic Others', 'MB Others');
    private $big = array(
        'Plastic' => array('塑膠', '漆', 'nut', '成型', '熱熔nut', '濺鍍', 'cnc', 'vm', '電鍍', '塗裝', '印刷'),
        'MG' => array('塑膠', '鎂鋁', '漆', '冷鍛', '壓鑄', '埋射', '衝切', '研磨', 'cnc', '皮膜', '塗裝', '加工', '雷雕', '印刷'),
        'AL' => array('塑膠', '鋁', '鋁擠', '髮絲', '衝壓', '埋射', '衝切', '研磨', 'cnc', '噴砂', '陽極', '加工', '蝕刻', '雷雕', '印刷'),
        'Assembly' => array('膠', '點膠', '壓合', '熱熔', '組裝'),
        'Sheet_Metal' => array('鐵件', '漆', 'nut', '銅柱', '衝壓', 'cnc', 'ed', '塗裝', '加工', '蝕刻', '雷雕', '印刷')
    );
    private $small = array(
        '塑膠' => array('塑料名稱1'=> 500, '重量1' => 300, '塑料名稱2'=> 500, '重量2' => 300),
        '漆' => array(
            '主漆料型號'=> 500,
            '主漆料品牌' => 300,
            '主漆料比例' => 300,
            '硬化劑型號' => 500,
            '硬化劑品牌' => 300,
            '硬化劑比例' => 300,
            '稀釋劑型號' => 500,
            '稀釋劑品牌' => 300,
            '稀釋劑比例' => 300,
            '塗裝件數' => 300
        ),
        'Nut' => array('Nut型號'=> 500, 'Nut品牌' => 300, 'Nut用量' => 300),
		'成型' => array(
            '成型_成型種類'=> 500,
            '成型機台廠牌或種類' => 300,
            '成型機台型號或噸數' => 300,
            '成型模具穴數' => 300,
            '成型秒數' => 300,
            '成型良率' => 300
		),
        '熱熔Nut' => array('熱熔Nut秒數' => 300, '熱熔Nut良率' => 300),
        '濺鍍' => array('濺鍍良率' => 300),
		'CNC' => array(
            'CNC工程種類'=> 500,
            'CNC機台廠牌' => 300,
            'CNC機台型號' => 300,
            'CNC秒數' => 300,
            'CNC良率' => 300
		),
		'VM' => array(
            'VM載具產出' => 300,
            'VM陽極線編號' => 300,
            'VM時數' => 300,
            'VM良率' => 300
		),
		'電鍍' => array(
            '電鍍載具產出' => 300,
            '電鍍陽極線編號' => 300,
            '電鍍時數' => 300,
            '電鍍良率' => 300
		),
		'塗裝' => array(
            '塗裝工程名稱'=> 500,
            '塗裝載具產出'=> 300,
            '塗裝線種類' => 300,
            '塗裝線編號' => 300,
            '塗裝秒數' => 300,
            '塗裝良率' => 300
		),
		'印刷' => array(
            '印刷項目'=> 500,
            '印刷機台廠牌'=> 300,
            '印刷機台型號' => 300,
            '印刷數量' => 300,
            '印刷良率' => 300
		),
		'鎂鋁' => array('鎂鋁金屬名稱' => 500,  '鎂鋁重量' => 300
		),
		'冷鍛' => array(
            '冷鍛工程種類'=> 500,
            '冷鍛機台廠牌' => 300,
            '冷鍛機台型號或噸數' => 300,
            '冷鍛工段' => 300,
            '冷鍛良率' => 300
		),
		'壓鑄' => array(
            '壓鑄模具穴數'=> 500,
            '壓鑄機台廠牌' => 300,
            '壓鑄機台型號' => 300,
            '壓鑄秒數' => 300,
            '壓鑄良率' => 300
		),
		'埋射' => array(
            '埋射塑件名稱'=> 500,
            '埋射成型種類'=> 300,
            '埋射機台廠牌或種類' => 300,
            '埋射機台型號或噸數' => 300,
            '埋射模具穴數' => 300,
            '埋射秒數' => 300,
            '埋射良率' => 300
		),
		'衝切' => array(
            '衝切工程種類'=> 500,
            '衝切機台廠牌' => 300,
            '衝切機台型號或噸數' => 300,
            '衝切非連續模工段' => 300,
            '衝切良率' => 300
		),
		'研磨' => array(
            '研磨工程種類'=> 500,
            '研磨機台廠牌'=> 300,
            '研磨機台型號' => 300,
            '研磨秒數' => 300,
            '研磨良率' => 300
		),
		'皮膜' => array(
            '皮膜載具產出'=> 300,
            '皮膜陽極線編號'=> 300,
            '皮膜時數' => 300,
            '皮膜良率' => 300
		),
		'加工' => array(
            '加工項目'=> 500,
            '加工秒數' => 300,
            '加工良率' => 300
		),
		'雷雕' => array(
            '雷雕工程種類'=> 500,
            '雷雕機台廠牌'=> 300,
            '雷雕機台型號' => 300,
            '雷雕秒數' => 300,
            '雷雕良率' => 300
		),
		'鋁' => array(
            '鋁長'=> 300,
            '鋁寬'=> 300,
            '鋁厚' => 300,
            '鋁金屬名稱' => 500,
            '鋁比重' => 300
		),
		'鋁擠' => array(
            '鋁擠工程種類'=> 500,
            '鋁擠線種類'=> 500,
            '鋁擠線編號' => 300,
            '鋁擠秒數' => 300,
            '鋁擠良率' => 300
		),
		'髮絲' => array(
            '髮絲工程種類'=> 500,
            '髮絲機台廠牌'=> 300,
            '髮絲機台型號' => 300,
            '髮絲秒數' => 300,
            '髮絲良率' => 300
		),
		'衝壓' => array(
            '衝壓工程種類'=> 500,
            '衝壓機台廠牌'=> 300,
            '衝壓機台型號或噸數' => 300,
            '衝壓連續模工段' => 300,
            '衝壓非連續模工段' => 300,
            '衝壓良率' => 300
		),
		'噴砂' => array(
            '噴砂工程種類'=> 500,
            '噴砂用砂型號'=> 300,
            '噴砂機台廠牌' => 300,
            '噴砂機台型號' => 300,
            '噴砂秒數' => 300,
            '噴砂良率' => 300
		),
		'陽極' => array(
            '陽極載具產出'=> 300,
            '陽極線編號'=> 300,
            '陽極時數' => 300,
            '陽極良率' => 300
		),
		'蝕刻' => array(
            '蝕刻載具產出'=> 300,
            '蝕刻線編號'=> 300,
            '蝕刻時數' => 300,
            '蝕刻良率' => 300
		),
		'鐵件' => array(
            '鐵件長'=> 300,
            '鐵件寬'=> 300,
            '鐵件厚' => 300,
            '鐵件金屬名稱' => 500,
            '鐵件比重' => 300
		),
		'銅柱' => array(
            '銅柱型號'=> 500,
            '銅柱品牌' => 300,
            '銅柱用量' => 300
		),
		'ED' => array(
            'ED載具產出'=> 300,
            'ED陽極線編號'=> 300,
            'ED時數' => 300,
            'ED良率' => 300
		),
		'膠' => array(
            '用膠型號'=> 500,
            '膠品牌' => 300,
            '膠用量' => 300
		),
		'點膠' => array(
            '點膠工程項目'=> 500,
            '點膠機台廠牌'=> 300,
            '點膠機台型號'=> 300,
            '點膠秒數' => 300,
            '點膠良率' => 300
		),
		'壓合' => array(
            '壓合子件名稱'=> 3000,
            '壓合機台廠牌'=> 300,
            '壓合機台型號'=> 300,
            '壓合秒數' => 500,
            '壓合良率' => 300
		),
		'熱熔' => array(
            '熱熔子件名稱'=> 3000,
            '熱熔機台廠牌'=> 300,
            '熱熔機台型號'=> 300,
            '熱熔秒數' => 500,
            '熱熔良率' => 300
		),
		'組裝' => array(
            '組裝件種類'=> 500,
            '組裝數量'=> 300,
            '組裝秒數' => 300,
            '組裝良率' => 300
		)
    );


    private $sql_array = array(
        //plastic
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
        "INSERT INTO `印刷` (`印刷項目`) VALUES ('參照設計');",
        //Assembly
        "INSERT INTO `膠` (`膠用量`) VALUES ('ml/pc');",
        "INSERT INTO `點膠` (`點膠工程項目`,`點膠秒數`) VALUES ('參照設計','參照設計');",
        "INSERT INTO `壓合` (`壓合秒數`) VALUES ('參照設計');",
        "INSERT INTO `熱熔` (`熱熔秒數`) VALUES ('參照設計');",
        "INSERT INTO `組裝` (`組裝件種類`,`組裝數量`,`組裝秒數`) VALUES ('參照設計','數量','秒數');",
        //MG
        "INSERT INTO `鎂鋁` (`鎂鋁重量`) VALUES ('克(含料頭)');",
        "INSERT INTO `冷鍛` (`冷鍛工程種類`,`冷鍛工段`) VALUES ('參照設計','工段數量');",
        "INSERT INTO `壓鑄` (`壓鑄模具穴數`,`壓鑄秒數`) VALUES ('一模幾穴','秒');",
        "INSERT INTO `埋射` (`埋射成型種類`,`埋射模具穴數`,`埋射秒數`) VALUES ('RHCM/HTM/後段噴漆/一般咬花/特殊咬花','一模幾穴','秒');",
        "INSERT INTO `衝切` (`衝切工程種類`,`衝切非連續模工段`) VALUES ('參照設計','工段數量');",
        "INSERT INTO `研磨` (`研磨工程種類`,`研磨秒數`) VALUES ('人工/汽動…','秒');",
        "INSERT INTO `皮膜` (`皮膜載具產出`,`皮膜時數`) VALUES ('件','小時');",
        "INSERT INTO `加工` (`加工項目`) VALUES ('件');",
        "INSERT INTO `雷雕` (`雷雕工程種類`,`雷雕秒數`) VALUES ('參照設計','參照設計');",
        //AL
        "INSERT INTO `鋁` (`鋁長`,`鋁寬`,`鋁厚`) VALUES ('下料尺寸mm','下料尺寸mm','下料尺寸mm');",
        "INSERT INTO `鋁擠` (`鋁擠工程種類`) VALUES ('參照設計');",
        "INSERT INTO `髮絲` (`髮絲工程種類`,`髮絲秒數`) VALUES ('參照設計','參照設計');",
        "INSERT INTO `衝壓` (`衝壓工程種類`,`衝壓連續模工段`,`衝壓非連續模工段`) VALUES ('參照設計','工段數量','工段數量');",
        "INSERT INTO `噴砂` (`噴砂用砂型號`,`噴砂秒數`) VALUES ('參照設計','參照設計');",
        "INSERT INTO `陽極` (`陽極載具產出`,`陽極時數`) VALUES ('件','小時');",
        "INSERT INTO `蝕刻` (`蝕刻載具產出`,`蝕刻時數`) VALUES ('件','小時');",
        //Sheet_Metal
        "INSERT INTO `鐵件` (`鐵件長`,`鐵件寬`,`鐵件厚`) VALUES ('下料尺寸mm','下料尺寸mm','下料尺寸mm');",
        "INSERT INTO `銅柱` (`銅柱用量`) VALUES ('PC');",
        "INSERT INTO `ED` (`ED載具產出`,`ED時數`) VALUES ('件','小時');"
    );
    //private $conn = mysql_connect($dbhost, $dbuser, $dbpass);
    /*private function connect($value=''){
    $dsn = 'mysql:host=' . $this->host;
    $pdo = new PDO($dsn, $this->user, $this->pwd);
    }*/
    function __construct($dbName){
    //create database

        if(! $this->connect($dbName) ){
            die('Could not connect: ' . mysql_error());
        }else {

            echo 'Connected successfully<br />';
            //開小表單 (row1 = table name)
            //                       塑膠 => array
            foreach ($this->small as $key => $value){
                $str = "`id` int(10) NOT NULL PRIMARY KEY auto_increment";
                foreach ($value as $item => $size) {//item = 塑料名稱, size = 500
                    $str .= ",`".$item ."` varchar(".$size.") DEFAULT NULL";
                }
                $sql = "CREATE TABLE ". $key ."( ".
                    $str .
                    ",submission_date TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP".
                    ") ENGINE=InnoDB DEFAULT CHARSET=utf8mb4; ";
                $stmt = $this->connect($dbName)->query($sql);
            }
            //開大表單(worksheet = table name)
            foreach ($this->big as $key => $value){
                $str = "";
                $str1 ="";
                foreach ($value as $item) {
                    $str .= "`".$item."` INT, ";
                    $str1 .= ", FOREIGN KEY (`" . $item ."`) REFERENCES `".$item."` (id)";
                }
                $sql = "CREATE TABLE ". $key ."( ".
                    "id INT NOT NULL AUTO_INCREMENT, ".
                    $str .
                    "submission_date TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP, ".
                    "PRIMARY KEY ( id )".
                    $str1 .
                    "); ";
                $stmt = $this->connect($dbName)->query($sql);
            }
            //subtitle: id+name
            /*$sql =" CREATE TABLE `subtitle` (
              `id` int(10) NOT NULL PRIMARY KEY auto_increment,
              `name` varchar(50) DEFAULT NULL
            ) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;";
            $stmt = $this->connect($dbName)->query($sql);*/

            //title: id+subtitle_id
            /*foreach ($this->catagory as $value) {
                $sql =" CREATE TABLE `".$value."` (
                  `id` int(10) NOT NULL PRIMARY KEY auto_increment,
                  `subtitle_id` int(10) NOT NULL
                ) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;";
                $stmt = $this->connect($dbName)->query($sql);
            }*/
            //件值表單 called 'object'
            $sql =" CREATE TABLE `components` (
              `id` int(10) NOT NULL PRIMARY KEY auto_increment,
              `name` varchar(50) DEFAULT NULL,
              `material` varchar(50) DEFAULT NULL,
              `material_id` int(10),
              `layer` varchar(50),
              `supplier` varchar(50),
              `amount` varchar(20),
              `remark` TEXT DEFAULT NULL,
              `submission_date` TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP
            ) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;";
            $stmt = $this->connect($dbName)->query($sql);
            //create catagory table
            $sql =" CREATE TABLE `catagory` (
              `id` int(10) NOT NULL PRIMARY KEY auto_increment,
              `catagory_name` varchar(50) DEFAULT NULL
            ) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;";
            $stmt = $this->connect($dbName)->query($sql);
            //run $sql_array
            foreach ($this->sql_array as $key => $value) {
                $stmt = $this->connect($dbName)->query($value);
            }
            //subtitle_object: id+subtitle_id+object_id
            /*$sql =" CREATE TABLE `subtitle_object` (
              `id` int(10) NOT NULL PRIMARY KEY auto_increment,
              `subtitle_id` int(10) NOT NULL,
              `object_id` int(10) NOT NULL,
              FOREIGN KEY (`subtitle_id`) REFERENCES `subtitle` (id),
              FOREIGN KEY (`object_id`) REFERENCES `object` (id)
            ) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;";
            $stmt = $this->connect($dbName)->query($sql);*/
            //還要移入一個紀錄所有案子的表單
        }
    //$retval = mysql_query( $sql, $conn );

    }
}
