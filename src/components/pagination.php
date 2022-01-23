<?php
if(isset($_GET["author"]))
?>
<nav aria-label="Page navigation example">
    <ul class="pagination justify-content-center">
        <li class="page-item <?php if($currentPage == 0) echo "disabled"; ?>">
            <?php
            if(isset($_GET["author"])) {
            ?>
                <a class="page-link" href="?author=<?php echo $_GET["author"]?>&page=<?php echo ($currentPage - 1); ?>">Previous</a>
            <?php
            } else {
            ?>
            <a class="page-link" href="?page=<?php echo ($currentPage - 1); ?>">Previous</a>
            <?php
            }
            ?>
        </li>
        <?php
        for($x = 0; $x < $pagesCount; $x++ )
        {
            if(isset($_GET["author"])) {
            ?>
            <li class="page-item <?php if($currentPage == $x) echo "active"; ?>" aria-current="page"><a class="page-link" href="?author=<?php echo $_GET["author"]?>&page=<?php echo $x; ?>"><?php echo ($x+1); ?></a></li>
            <?php
            } else {
                ?>
                <li class="page-item <?php if($currentPage == $x) echo "active"; ?>" aria-current="page"><a class="page-link" href="?page=<?php echo $x; ?>"><?php echo ($x+1); ?></a></li>
            <?php
            }
        }
        ?>
        <li class="page-item <?php if($currentPage == ($pagesCount -1) ) echo "disabled"; ?>">

            <?php
            if(isset($_GET["author"])) {
                ?>
                <a class="page-link" href="?author=<?php echo $_GET["author"]?>&page=<?php echo ($currentPage + 1); ?>">Next</a>
                <?php
            } else {
                ?>
                <a class="page-link" href="?page=<?php echo ($currentPage + 1); ?>">Next</a>
                <?php
            }
            ?>
        </li>
    </ul>
</nav>