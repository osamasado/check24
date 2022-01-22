<?php

$server_path = '../../';
session_start();
if(isset($_SESSION["loggedIn"]) and $_SESSION["loggedIn"]) {
    $_SESSION["loggedIn"] = false;
    $_SESSION["username"] = "";
}
header("location:".$server_path);