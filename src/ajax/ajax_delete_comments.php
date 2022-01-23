<?php

use check24\service\DatabaseConnector;

$server_path = '../../';
require_once('../service/DatabaseConnector.php');
$dbConnect = new DatabaseConnector();
$connection = $dbConnect->dbConnect();
$id = $dbConnect->deleteWhere('comment','id',$_GET["id"]);

echo $id;

