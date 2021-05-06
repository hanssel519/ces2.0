<?php
/**
 *
 */
class Central extends Dbh
{

    function __construct(argument)
    {
        // code...
    }
    //在front page列出所有project names
    public function show($value=''){
        $sql = 'SELECT name FROM cases';
        $stmt = $this->connect(`CEScentral`)->query($sql);
        //return $stmt;
    }
}
