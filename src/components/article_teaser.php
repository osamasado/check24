<?php
?>
<div class="container bg-info rounded">
    <a href="./src/views/article_details.php?id=<?php echo $articles[$i]["id"];?>" class="grid-teaser-link">
        <div>
            <?php echo $dateStr. ', '.date('h:i', $date).'h - '.$articles[$i]["title"];?>
        </div>
        <div class="mb-3"></div>
        <div class="row">
            <div class="col-lg-9 col-sm-12 col-md-6">
                <p class="grid-text">
                    <?php echo $text;?>
                </p>
            </div>
            <div class="col-lg-3 col-sm-12 col-md-6">
                <img class="rounded grid-image"
                     src="<?php echo $articles[$i]["image"];?>">
            </div>
        </div>
    </a>
    <div class="row">
        <div class="col-lg-6 col-sm-6 col-md-6">
            <a href="<?php echo $server_path;?>?author=<?php echo $articles[$i]["author"];?>" class="grid-teaser-link"><?php echo 'Author'. ': '.$articles[$i]["author"];?></a>
        </div>
        <div class="col-4 col-sm-6 col-md-6">
            <a href="./src/views/article_details.php?id=<?php echo $articles[$i]["id"];?>" class="grid-teaser-link"><?php echo 'Comments'. ': '.count($comments);?></a>
        </div>
        <div class="mb-3"></div>
    </div>

</div>
<div class="mb-3"></div>
