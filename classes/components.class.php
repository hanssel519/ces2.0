<?php
/**
 *
 */
class Components extends Dbh
{

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
    public function showAllComponents($projectName=''){
        if(! $this->serverConnect() ){
            die('Could not connect: ' . mysql_error());
        }else {

                //equals to table name
                $tmp = array();
                $total = array();
                $sql = "SELECT * FROM `components`;";
                $stmt = $this->connect($projectName)->query($sql);
                while ($row = $stmt->fetch()){//THEOMETRICALLY only one match
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
}
