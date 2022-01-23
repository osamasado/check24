<?php
?>
<div class="row rounded">
    <div class="col-1"></div>
    <div class="col-10 bg-info">
        <div>
            <?php echo $dateStr . ', ' . date('h:i', $date) . 'h'; ?>
        </div>
        <div class="mb-3"></div>
        <div>
            <h5>
                <?php echo $article[0]["title"]; ?>
            </h5>
        </div>
        <div class="mb-3"></div>
        <div>
            <img class="rounded" width="100%"
                 src="<?php echo $article[0]["image"]; ?>">
        </div>
        <div class="row">
            <div class="mb-3"></div>
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
    <div class="col-1"></div>
</div>
<div class="mb-3"></div>