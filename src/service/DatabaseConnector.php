<?php

namespace check24\service;

use JetBrains\PhpStorm\Pure;

mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);

include_once('DatabaseConfig.php');

class DatabaseConnector
{
    private $connectionString;
    private $dataSet;
    private $sqlQuery;
    private static $instance = null;

    protected $databaseName;
    protected $hostName;
    protected $userName;
    protected $passWord;

    private function __construct() {
        $this -> connectionString = NULL;
        $this -> sqlQuery = NULL;
        $this -> dataSet = NULL;
        $this -> databaseName = Databaseconfig::$dbName;
        $this -> hostName =  Databaseconfig::$hostName;
        $this -> userName =  Databaseconfig::$userName;
        $this -> passWord =  Databaseconfig::$passWord;
    }
    public static function getInstance(): ?DatabaseConnector
    {
        if(!self::$instance)
        {
            self::$instance = new DatabaseConnector();
        }

        return self::$instance;
    }

    public function dbConnect()
    {
        $this -> connectionString = mysqli_connect($this -> hostName,$this -> userName,$this -> passWord);
        mysqli_select_db($this -> connectionString,$this -> databaseName);
        return $this -> connectionString;
    }

    private function error($msg) {
        echo $msg;
    }

    public function dbDisconnect() {
        $close = mysqli_close($this->connectionString);
        if(!$close)
        {
            $this->error("Connection close failed");
        }
        $this -> connectionString = NULL;
        $this -> sqlQuery = NULL;
        $this -> dataSet = NULL;
        $this -> databaseName = NULL;
        $this -> hostName = NULL;
        $this -> userName = NULL;
        $this -> passWord = NULL;
    }

    public function selectAll($tableName)  {
        $this -> sqlQuery = 'SELECT * FROM '.$this -> databaseName.'.'.$tableName . ' ORDER BY date DESC';
        $this -> dataSet = mysqli_query($this -> connectionString, $this -> sqlQuery);
        if(!$this -> dataSet)
        {
            $message = "Bad Query !";
            $this->error($message);
            return false;
        }
        else
        {
            $count = 0;
            $data = array();
            while($row = mysqli_fetch_array($this -> dataSet, MYSQLI_ASSOC))
            {
                $data[$count] = $row;
                $count++;
            }
            mysqli_free_result($this -> dataSet);
            return $data;
        }
        // return $this -> dataSet;
    }

    public function selectWhere($tableName,$rowName,$operator,$value,$valueType, $andWhere = '')   {
        $this -> sqlQuery = 'SELECT * FROM '.$tableName.' WHERE '.$rowName.' '.$operator.' ';
        if($valueType == 'int') {
            $this -> sqlQuery .= $value;
        }
        else if($valueType == 'char')   {
            $this -> sqlQuery .= "'".$value."'";
        }
        if($andWhere != '') {
            $this -> sqlQuery .= $andWhere;
        }
        $this -> dataSet = mysqli_query($this -> connectionString, $this -> sqlQuery);
        $this -> sqlQuery = NULL;
        if(!$this -> dataSet)
        {
            $message = "Bad Query !";
            $this->error($message);
            return false;
        }
        else
        {
            $count = 0;
            $data = array();
            while($row = mysqli_fetch_array($this -> dataSet, MYSQLI_ASSOC))
            {
                $data[$count] = $row;
                $count++;
            }
            mysqli_free_result($this -> dataSet);
            return $data;
        }
        // return $this -> dataSet;
        #return $this -> sqlQuery;
    }


    public function insertInto($tableName,$cols,$values) {

        $i = NULL;

        $this -> sqlQuery = 'INSERT INTO '.$tableName.' (';
        $i = 0;
        while($i < count($cols)) {
            if($cols[$i] != NULL) {
                // $this -> sqlQuery .= "'".$cols[$i]."'";
                $this -> sqlQuery .= $cols[$i];
                if($i < count($cols) - 1)  {
                    $this -> sqlQuery .= ', ';
                }
                $i++;
            }
        }
        $this -> sqlQuery .= ')';
        $this -> sqlQuery .= ' VALUES (';
        $i = 0;
        while($i < count($values)) {
            //if($values[$i]["val"] != NULL && $values[$i]["type"] != NULL) {
                if($values[$i]["type"] == "char") {
                    $this -> sqlQuery .= "'".$values[$i]["val"]."'";
                }
                else if($values[$i]["type"] == 'int') {
                    $this -> sqlQuery .= $values[$i]["val"];
                }
                if($i < count($values) - 1)  {
                    $this -> sqlQuery .= ', ';
                }
                $i++;
            //}
        }

        $this -> sqlQuery .= ')';
        // echo $this -> sqlQuery;
        // exit;
        $result = mysqli_query($this -> connectionString,$this -> sqlQuery);
        $id = mysqli_insert_id($this -> connectionString);
        return $id;
        #$this -> sqlQuery = NULL;
    }

    public function updateWhere($tableName,$cols,$values,$pkCol, $pkValue, $andWhere = false, $foreignKey = '', $foreignValue = ''): string
    {

        $i = NULL;

        $this -> sqlQuery = 'UPDATE '.$tableName.' SET ';
        $i = 0;
        while($i < count($cols)) {
            if($cols[$i] != NULL) {
                // $this -> sqlQuery .= "'".$cols[$i]."'";
                $this -> sqlQuery .= $cols[$i];
                $this -> sqlQuery .= ' = ';
                if($values[$i]["type"] == "char") {
                    $this -> sqlQuery .= "'".$values[$i]["val"]."'";
                }
                else if($values[$i]["type"] == 'int') {
                    $this -> sqlQuery .= $values[$i]["val"];
                }
                if($i < count($cols) - 1)  {
                    $this -> sqlQuery .= ', ';
                }
                $i++;
            }
        }
        $this -> sqlQuery .= ' WHERE '. $pkCol . ' = '. $pkValue;
        if($andWhere && $foreignKey != '' && $foreignValue != '') {
            $this -> sqlQuery .= ' AND WHERE '. $foreignKey . ' = '. $foreignValue;
        }
        // echo $this -> sqlQuery;
        // exit;
        $result = mysqli_query($this -> connectionString,$this -> sqlQuery);
        // var_dump($result);
        return $this -> sqlQuery;
        #$this -> sqlQuery = NULL;
    }

    public function deleteWhere($tableName,$pkCol, $pkValue, $andWhere = ''): string
    {
        $this -> sqlQuery = 'DELETE FROM '.$tableName;
        $this -> sqlQuery .= ' WHERE '. $pkCol . ' = '. $pkValue;
        if($andWhere != '') {
            $this -> sqlQuery .= $andWhere;
        }
        // echo $this -> sqlQuery;
        // exit;
        $result = mysqli_query($this -> connectionString,$this -> sqlQuery);
        // var_dump($result);
        return $this -> sqlQuery;
        #$this -> sqlQuery = NULL;
    }




}