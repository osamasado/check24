<?php

namespace check24\service;

class DatabaseConfig
{
    public  $hostName;
    public $userName;
    public $passWord;
    public $dbName;

    public function __construct($host = 'localhost', $userName = 'root', $passWord = '', $dbName = 'check24_db') {
        $this -> hostName = $host;
        $this -> userName = $userName;
        $this -> passWord = $passWord;
        $this -> dbName = $dbName;
    }

}