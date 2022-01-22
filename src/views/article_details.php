<?php

use check24\service\DatabaseConnector;

session_start();
$server_path = '../../';
include_once($server_path . 'src/components/main_menu.php');
require_once('../service/DatabaseConnector.php');
$dbConnect = new DatabaseConnector();
$connection = $dbConnect->dbConnect();
if (isset($_POST['SubmitButton'])) {
    $cols = ['name', 'mail', 'url', 'text', 'id_article'];

    $values = [
        array("val" => $_POST["name"], "type" => "char"),
        array("val" => $_POST["mail"], "type" => "char"),
        array("val" => $_POST["url"], "type" => "char"),
        array("val" => $_POST["text"], "type" => "char"),
        array("val" => $_POST["id_article"], "type" => "int"),
    ];
//    var_dump($cols);
//    var_dump($values);
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
?>
<html>
<body>
<div class="container bg-info rounded">
    <div>
        <?php echo $dateStr . ', ' . date('h:i', $date) . 'H'; ?>
    </div>
    <div>
        <?php echo $article[0]["title"]; ?>
    </div>
    <div>
        <img class="rounded"
             src="<?php echo $server_path . 'attachments/' . $article[0]["image"]; ?>">
    </div>
    <div class="row">
        <div>
            <?php echo $article[0]["text"]; ?>
        </div>
    </div>
    <div class="mb-3"></div>
    <div class="row">
        <div><h5>
                <?php echo 'Author' . ': ' . $article[0]["author"]; ?>
            </h5>
        </div>
    </div>
</div>
<div class="mb-3"></div>
<?php
for ($i = 0; $i < count($comments); $i++) {
    $commentDate = strtotime($comments[$i]["date"]);
    $commentDateStr = date('d.m.Y', $commentDate);
    $today = date('d.m.Y');
    if ($commentDateStr == $today)
        $commentDateStr = 'Today';
    ?>
    <div class="row" id="comment_row<?php echo $comments[$i]["id"]; ?>">
        <div class="col-2"></div>
        <div class="col-7">
            <?php echo ($i + 1) . "- " . $comments[$i]["name"] . " meinte am (" . $commentDateStr . ',' . date('h:i', $commentDate) . "H): " . $comments[$i]["text"]; ?></li>
        </div>
        <div class="col-1">
            <button type="button" class="btn btn-error" name="DeleteButton"
                    onclick="deleteComment('<?php echo $comments[$i]["id"]; ?>');">X
            </button>
        </div>
        <div class="col-2"></div>
    </div>
    <?php
}
?>
<div class="mb-3"></div>
<div class="row">
    <div class="col-3"></div>
    <div class="col-6">
        <form method="post" action="#" enctype="multipart/form-data">
            <input type="hidden" id="id_article" name="id_article" value="<?php echo $_GET["id"]; ?>">
            <div class="form-row">
                <div class="mb-3">
                    <label for="name">Name</label>
                    <input type="text" class="form-control" name="name" id="name" placeholder="Name" required>
                </div>
            </div>
            <div class="form-row">
                <div class="mb-3">
                    <label for="mail">Mail</label>
                    <input type="mail" class="form-control" name="mail" id="mail" placeholder="Mail">
                </div>
            </div>
            <div class="mb-3">
                <label for="url" class="form-label">URL</label>
                <input class="form-control" type="text" id="url" name="url" placeholder="Url">
            </div>
            <div class="mb-3">
                <label for="Text" class="form-label">Comments</label>
                <textarea class="form-control" id="Text" name="text" rows="3" placeholder="Comment ..."
                          required></textarea>
            </div>
            <button type="submit" class="btn btn-primary" name="SubmitButton">Save</button>
        </form>
    </div
    <div class="col-3"></div>
</div>
<script src="../../assets/js/ajax_request.js" type="text/javascript"></script>
<script type="text/javascript">
    function deleteComment(id) {
        var url = 'id=' + id;
        if (confirm("Are you sure you want to delete this comment?")) {
            AjaxRequest.get
            (
                {
                    'url': encodeURI('delete_comments.php?' + url),
                    'onSuccess': function success(req) {
                        var res = req.responseText;
                        document.getElementById("comment_row" + id).style.display = 'none';
                    }
                }
            );
        }

    }
</script>
</body>
</html>
