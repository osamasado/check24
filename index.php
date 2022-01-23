<?php
$server_path = './';
session_start();
include_once('./src/components/header.php');

if(isset($_GET["author"]))
    $articles = $dbConnect->selectWhere('article','author','=',$_GET["author"],'char', '');
else
    $articles = $dbConnect->selectAll('article');
?>
<body>
<div class="mb-3"></div>
<?php
$itemsPerPage = 3;
$currentPage = 0;
if(isset($_GET["page"]))
    $currentPage = $_GET["page"];
$pagesCount = ceil(count($articles) / $itemsPerPage) ;
$start = $currentPage * $itemsPerPage;
$end = $start + $itemsPerPage;
if($end > count($articles))
    $end = count($articles);
if(isset($_SESSION["loggedIn"]) and $_SESSION["loggedIn"]) {

 for($i = $start; $i < $end; $i++) {
     $date = strtotime($articles[$i]["date"]);
     $dateStr = date('d.m.Y', $date);
     $today = date('d.m.Y');
     if($dateStr == $today)
         $dateStr = 'Today';
     $comments = $dbConnect->selectWhere('comment','id_article','=',$articles[$i]["id"],'char', '');
     $text = $articles[$i]["text"];
     if(strlen($articles[$i]["text"]) > 1000) {
         $text = substr($articles[$i]["text"],0, 1000). '...';
     }
     include($server_path.'src/components/article_teaser.php');
 }
include_once($server_path.'src/components/pagination.php');
}
include_once($server_path.'src/components/footer.php');
?>
</body>