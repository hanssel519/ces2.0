<?php
/**
 *
 */
class catagory extends Dbh
{
    function __construct()
    {
        // code...
    }
    public function querySubtitle($title){
        //table=$title的subtitle_id和table=subtitle的id做join
        //return table=subtitle的name
        $sql = "SELECT subtitle.id, subtitle.name
            FROM subtitle
            INNER JOIN `".$title."`
            ON subtitle.id=`".$title."`.subtitle_id;";
        $data = $this->connect($_COOKIE['projectName'])->query($sql)->fetchAll();
        //忘記選資料庫
        $output[] = array();
        foreach($data as $row){
            $output[] = array(
                'name' => $row["name"],
                'id' => $row["id"]
            );
        }
        return $output;
    }
    public function queryLeaf($subtitle){
        //table=$title的subtitle_id和table=subtitle的id做join
        //return table=subtitle的name
        $sql = "SELECT obj.name
            FROM object AS obj
            INNER JOIN subtitle_object s_obj
            on obj.id = s_obj.object_id
            INNER JOIN subtitle subtitle
            on s_obj.subtitle_id = subtitle.id
            WHERE subtitle.name = '".$subtitle."';";
        $data = $this->connect($_COOKIE['projectName'])->query($sql)->fetchAll();

        var_dump($data);
        echo "<br>";
        $output[] = array();
        foreach($data as $row){
            $output[] = array(
                'name' => $row["name"],
                'id' => $row["id"]
            );
        }
        return $output;
    }
}
