<?php
?>
<div class="row" id="comment_row<?php echo $comments[$i]["id"]; ?>">
    <div class="col-1"></div>
    <div class="col-9">
        <?php echo ($i + 1) . "- " . $comments[$i]["name"] . " meinte am (" . $commentDateStr . ',' . date('h:i', $commentDate) . "h): " . $comments[$i]["text"]; ?></li>
    </div>
    <div class="col-1">
        <button type="button" class="btn btn-error" name="DeleteButton"
                onclick="deleteComment('<?php echo $comments[$i]["id"]; ?>');">X
        </button>
    </div>
    <div class="col-1"></div>
</div>
