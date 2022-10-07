<?php

class Cnn
{

    public $mysqli;

    function __construct($credentials)
    {
        try {
            $this->mysqli = new mysqli($credentials['host'], $credentials['username'], $credentials['password'], $credentials['database'], $credentials['port']);
        } catch (Exception $exc) {
            echo 'Failed, the error is' . $exc;
        }
        mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);
    }


    public function givenQuery($param)
    {
        $this->mysqli->query($param);

        if (str_contains($param, 'SELECT')) {
            $infoDb = [];
            $selectObj = $this->mysqli->query($param);
            while ($info = $selectObj->fetch_assoc()) {
                $infoDb[] = $info;
            }
            return $infoDb;
                    //Return fora do while, se não ele parará a função no primeiro loop e salvará somente a primeira linha. 
        }
    }
}