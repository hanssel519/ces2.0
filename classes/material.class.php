<?php
/**
 *
 */
class Material extends Dbh
{
    private $material_list = array('plastic', 'mg', 'al', 'sheet_metal');
    function __construct()
    {
        // code...
    }
    public function checkIfValid($material=''){
        if (in_array(strtolower($material), $this->material_list)){
            //echo "true".strtolower($material). "<br>";
            return true;
        }else {
            //echo "false".strtolower($material). "<br>";
            return false;
        }
    }
}
