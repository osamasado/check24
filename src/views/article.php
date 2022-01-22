<?php
use check24\service\DatabaseConnector;

$server_path = '../../';
session_start();
include_once($server_path . 'src/components/main_menu.php');
require_once ('../service/DatabaseConnector.php');

if (isset($_POST['SubmitButton'])) {
    $dbConnect = new DatabaseConnector();
    $connection = $dbConnect->dbConnect();
    $cols = ['title','author','image','text'];
//    $lastUpdated = gmdate('D, d M Y H:i:s');
    $file_array = $_FILES["attachment"];
    $file_name="";
    if ($file_array["name"] != "")
    {
        $ext = explode(".", $file_array["name"]);
        $ext = $ext[count($ext) - 1];
        $id = rand(1, 5000);
        move_uploaded_file($file_array["tmp_name"],"../../attachments/article_".$id.".".$ext);
        $file_name="article_".$id.".".$ext;
    }
    $values = [
        array("val" => $_POST["title"], "type" => "char"),
        array("val" => $_POST["author"], "type" => "char"),
        array("val" => $file_name, "type" => "char"),
        array("val" => $_POST["text"], "type" => "char"),
    ];
//    var_dump($cols);
//    var_dump($values);
    $dbConnect->insertInto('article', $cols,$values);
    unset($_POST);
    header("Location: ".$server_path);
}
?>
<html>
    <body>
        <div class="row">
            <div class="col-3"></div>
            <div class="col-6">
                <form method="post" action="#" enctype="multipart/form-data">
                    <input type="hidden" id="author" name="author" value="<?php echo $_SESSION["username"];?>">
                    <div class="form-row">
                        <div class="mb-3">
                            <label for="inputTitle">Title</label>
                            <input type="text" class="form-control" name="title" id="Title" placeholder="Title" required>
                        </div>
                    </div>
                    <div class="mb-3">
                        <label for="attachment" class="form-label">Image</label>
                        <input class="form-control" type="file" id="attachment" name="attachment" required>
                    </div>
                    <div class="mb-3">
                        <label for="Text" class="form-label">Text</label>
                        <textarea class="form-control" id="Text" name="text" rows="3" placeholder="Article Text ..." required></textarea>
                    </div>
                    <button type="submit" class="btn btn-primary" name="SubmitButton">Save</button>
                </form>
            </div
            <div class="col-3"></div>
        </div>
    </body>
</html>
