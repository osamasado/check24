<?php
session_start();
$server_path = '../../';
include($server_path . 'src/components/header.php');
if (isset($_POST['SubmitButton'])) {
    $cols = ['name', 'mail', 'url', 'text', 'id_article'];

    $values = [
        array("val" => $_POST["name"], "type" => "char"),
        array("val" => $_POST["mail"], "type" => "char"),
        array("val" => $_POST["url"], "type" => "char"),
        array("val" => $_POST["text"], "type" => "char"),
        array("val" => $_POST["id_article"], "type" => "int"),
    ];
    $dbConnect->insertInto('comment', $cols, $values);
    unset($_POST);
    header("Location: " . $_SERVER['REQUEST_URI']);
    exit;
}
$article = $dbConnect->selectWhere('article', 'id', '=', $_GET["id"], 'char', '');
$date = strtotime($article[0]["date"]);
$dateStr = date('d.m.Y', $date);
$today = date('d.m.Y');
if ($dateStr == $today)
    $dateStr = 'Today';
$comments = $dbConnect->selectWhere('comment', 'id_article', '=', $_GET["id"], 'char', '');
include_once($server_path . 'src/components/article_teaser_bg.php');
?>

<?php
for ($i = 0; $i < count($comments); $i++) {
    $commentDate = strtotime($comments[$i]["date"]);
    $commentDateStr = date('d.m.Y', $commentDate);
    $today = date('d.m.Y');
    if ($commentDateStr == $today)
        $commentDateStr = 'Today';
    include($server_path . 'src/components/comment_teaser.php');
}
include_once($server_path . 'src/components/comment_form.php');
include_once($server_path . 'src/components/footer.php');
?>
