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
        '塑膠' => array('塑料名稱'=> 500, '重量' => 300),
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
        'Nut' => array('型號'=> 500, '品牌' => 300, '用量' => 300),
		'成型' => array(
            '成型種類'=> 500,
            '機台廠牌或種類' => 300,
            '機台型號或噸數' => 300,
            '模具穴數' => 300,
            '秒數' => 300,
            '良率' => 300
		),
        '熱熔Nut' => array('秒數' => 300, '良率' => 300),
        '濺鍍' => array('良率' => 300),
		'CNC' => array(
            '工程種類'=> 500,
            '機台廠牌' => 300,
            '機台型號' => 300,
            '秒數' => 300,
            '良率' => 300
		),
		'VM' => array(
            '載具產出' => 300,
            '陽極線編號' => 300,
            '時數' => 300,
            '良率' => 300
		),
		'電鍍' => array(
            '載具產出' => 300,
            '陽極線編號' => 300,
            '時數' => 300,
            '良率' => 300
		),
		'塗裝' => array(
            '工程名稱'=> 500,
            '載具產出'=> 300,
            '塗裝線種類' => 300,
            '塗裝線編號' => 300,
            '秒數' => 300,
            '良率' => 300
		),
		'印刷' => array(
            '印刷項目'=> 500,
            '機台廠牌'=> 300,
            '機台型號' => 300,
            '印刷數量' => 300,
            '良率' => 300
		),
		'鎂鋁' => array('金屬名稱' => 500,  '重量' => 300
		),
		'冷鍛' => array(
            '工程種類'=> 500,
            '機台廠牌' => 300,
            '機台型號或噸數' => 300,
            '工段' => 300,
            '良率' => 300
		),
		'壓鑄' => array(
            '模具穴數'=> 500,
            '機台廠牌' => 300,
            '機台型號' => 300,
            '秒數' => 300,
            '良率' => 300
		),
		'埋射' => array(
            '塑件名稱'=> 500,
            '成型種類'=> 300,
            '機台廠牌或種類' => 300,
            '機台型號或噸數' => 300,
            '模具穴數' => 300,
            '秒數' => 300,
            '良率' => 300
		),
		'衝切' => array(
            '工程種類'=> 500,
            '機台廠牌' => 300,
            '機台型號或噸數' => 300,
            '非連續模工段' => 300,
            '良率' => 300
		),
		'研磨' => array(
            '工程種類'=> 500,
            '機台廠牌'=> 300,
            '機台型號' => 300,
            '秒數' => 300,
            '良率' => 300
		),
		'皮膜' => array(
            '載具產出'=> 300,
            '陽極線編號'=> 300,
            '時數' => 300,
            '良率' => 300
		),
		'加工' => array(
            '加工項目'=> 500,
            '秒數' => 300,
            '良率' => 300
		),
		'雷雕' => array(
            '工程種類'=> 500,
            '機台廠牌'=> 300,
            '機台型號' => 300,
            '秒數' => 300,
            '良率' => 300
		),
		'鋁' => array(
            '長'=> 300,
            '寬'=> 300,
            '厚' => 300,
            '金屬名稱' => 500,
            '比重' => 300
		),
		'鋁擠' => array(
            '工程種類'=> 500,
            '鋁擠線種類'=> 500,
            '鋁擠線編號' => 300,
            '秒數' => 300,
            '良率' => 300
		),
		'髮絲' => array(
            '工程種類'=> 500,
            '機台廠牌'=> 300,
            '機台型號' => 300,
            '秒數' => 300,
            '良率' => 300
		),
		'衝壓' => array(
            '工程種類'=> 500,
            '機台廠牌'=> 300,
            '機台型號或噸數' => 300,
            '連續模工段' => 300,
            '非連續模工段' => 300,
            '良率' => 300
		),
		'噴砂' => array(
            '工程種類'=> 500,
            '用砂型號'=> 300,
            '機台廠牌' => 300,
            '機台型號' => 300,
            '秒數' => 300,
            '良率' => 300
		),
		'陽極' => array(
            '載具產出'=> 300,
            '陽極線編號'=> 300,
            '時數' => 300,
            '良率' => 300
		),
		'蝕刻' => array(
            '載具產出'=> 300,
            '蝕刻線編號'=> 300,
            '時數' => 300,
            '良率' => 300
		),
		'鐵件' => array(
            '長'=> 300,
            '寬'=> 300,
            '厚' => 300,
            '金屬名稱' => 500,
            '比重' => 300
		),
		'銅柱' => array(
            '型號'=> 500,
            '品牌' => 300,
            '用量' => 300
		),
		'ED' => array(
            '載具產出'=> 300,
            '陽極線編號'=> 300,
            '時數' => 300,
            '良率' => 300
		),
		'膠' => array(
            '用膠型號'=> 500,
            '品牌' => 300,
            '用量' => 300
		),
		'點膠' => array(
            '工程項目'=> 500,
            '機台廠牌'=> 300,
            '機台型號'=> 300,
            '秒數' => 300,
            '良率' => 300
		),
		'壓合' => array(
            '子件名稱'=> 3000,
            '機台廠牌'=> 300,
            '機台型號'=> 300,
            '秒數' => 500,
            '良率' => 300
		),
		'熱熔' => array(
            '子件名稱'=> 3000,
            '機台廠牌'=> 300,
            '機台型號'=> 300,
            '秒數' => 500,
            '良率' => 300
		),
		'組裝' => array(
            '組裝件種類'=> 500,
            '數量'=> 300,
            '秒數' => 300,
            '良率' => 300
		)
    );


    private $sql_array = array(
        "INSERT INTO `塑膠` (`塑膠_id`, `塑料名稱`, `重量`) VALUES (1, NULL, '克(含料頭)');",
        "INSERT INTO `漆` (`塗裝件數`) VALUES ('片/KG');",
        "INSERT INTO `Nut` (`用量`) VALUES ('PC');",
        "INSERT INTO `成型` (`成型種類`,`模具穴數`,`秒數`) VALUES
        ('RHCM/HTM/後段噴漆/一般咬花/特殊咬花','一模幾穴','秒');",
        "INSERT INTO `熱熔Nut` (`秒數`) VALUES ('秒');",
        "INSERT INTO `濺鍍` (`良率`) VALUES ('百分比');",
        "INSERT INTO `CNC` (`工程種類`,`秒數`) VALUES ('參照設計','秒');",
        "INSERT INTO `VM` (`載具產出`,`時數`) VALUES ('件','小時');",
        "INSERT INTO `電鍍` (`載具產出`,`時數`) VALUES ('件','小時');",
        "INSERT INTO `塗裝` (`工程名稱`,`載具產出`,`秒數`) VALUES
        ('參照設計','件','秒');",
        "INSERT INTO `印刷` (`印刷項目`) VALUES ('參照設計');"
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
                    "submission_date DATE, ".
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
              `備註` TEXT DEFAULT NULL
            ) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;";
            $stmt = $this->connect($dbName)->query($sql);
            //subtitle_object: id+subtitle_id+object_id
            $sql =" CREATE TABLE `subtitle_object` (
              `id` int(10) NOT NULL PRIMARY KEY auto_increment,
              `subtitle_id` int(10) NOT NULL,
              `object_id` int(10) NOT NULL,
              FOREIGN KEY (`subtitle_id`) REFERENCES `subtitle` (id),
              FOREIGN KEY (`object_id`) REFERENCES `object` (id)
            ) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;";
            $stmt = $this->connect($dbName)->query($sql);
            //還要移入一個紀錄所有案子的表單
        }
    //$retval = mysql_query( $sql, $conn );

    }
}
