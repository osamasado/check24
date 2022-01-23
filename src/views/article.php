<?php
//use check24\service\DatabaseConnector;
$server_path = '../../';
session_start();
include_once($server_path . 'src/components/header.php');
//require_once ('../service/DatabaseConnector.php');

if (isset($_POST['SubmitButton'])) {
//    $dbConnect = new DatabaseConnector();
//    $connection = $dbConnect->dbConnect();
    $cols = ['title','author','image','text'];
//    $file_array = $_FILES["attachment"];
//    $file_name="";
//    if ($file_array["name"] != "")
//    {
//        $ext = explode(".", $file_array["name"]);
//        $ext = $ext[count($ext) - 1];
//        $id = rand(1, 5000);
//        move_uploaded_file($file_array["tmp_name"],"../../attachments/article_".$id.".".$ext);
//        $file_name="article_".$id.".".$ext;
//    }
    $values = [
        array("val" => $_POST["title"], "type" => "char"),
        array("val" => $_POST["author"], "type" => "char"),
        array("val" => $_POST["attachment"], "type" => "char"),
        array("val" => $_POST["text"], "type" => "char"),
    ];
    $dbConnect->insertInto('article', $cols,$values);
    unset($_POST);
    header("Location: ".$server_path);
}
include_once($server_path.'src/components/article_form.php');
include_once($server_path.'src/components/footer.php');