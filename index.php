<?php
$server_path = './';
use check24\service\DatabaseConnector;
require_once ('./src/service/DatabaseConnector.php');
session_start();
// $_SESSION["loggedIn"] = true;
include_once('./src/components/main_menu.php');
$dbConnect = new DatabaseConnector();
$connection = $dbConnect->dbConnect();
$articles = $dbConnect->selectAll('article');
//print_r($articles);
?>
<body>
<div class="mb-3"></div>
<?php
if(isset($_SESSION["loggedIn"]) and $_SESSION["loggedIn"]) {
 for($i = 0; $i < count($articles); $i++) {
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
    ?>

     <div class="container bg-info rounded">
         <a href="./src/views/article_details.php?id=<?php echo $articles[$i]["id"];?>" style="text-decoration: none; color: black;">
             <div>
                 <?php echo $dateStr. ', '.date('h:i', $date).' - '.$articles[$i]["title"];?>
             </div>
             <div class="row">
                 <div class="col-9">
                     <p class="text-justify">
                     <?php echo $text;?>
                     </p>
                 </div>
                 <div class="col-3">
                     <img class="rounded grid-image"
                          src="<?php echo './attachments/'.$articles[$i]["image"];?>">
                 </div>
             </div>
         </a>
         <div class="row">
             <div class="col-6">
                 <?php echo 'Author'. ': '.$articles[$i]["author"];?>
             </div>
             <div class="col-4">
                 <a href="./src/views/article_details.php?id=<?php echo $articles[$i]["id"];?>" style="text-decoration: none; color: black;"><?php echo 'Comments'. ': '.count($comments);?></a>
             </div>
         </div>
     </div>
     <div class="mb-3"></div>
<?php
 }
?>

<nav aria-label="Page navigation example">
    <ul class="pagination justify-content-center">
        <li class="page-item disabled">
            <a class="page-link">Previous</a>
        </li>
        <li class="page-item"><a class="page-link" href="#">1</a></li>
        <li class="page-item"><a class="page-link" href="#">2</a></li>
        <li class="page-item"><a class="page-link" href="#">3</a></li>
        <li class="page-item">
            <a class="page-link" href="#">Next</a>
        </li>
    </ul>
</nav>
<?php
}
?>
</body>