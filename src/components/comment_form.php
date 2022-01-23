<?php
?>
<div class="row mt-3 ">
    <div class="col-1"></div>
    <div class="col-10 bg-info">
        <div class="row mb-3"></div>
        <form method="post" action="#" enctype="multipart/form-data">
            <input type="hidden" id="id_article" name="id_article" value="<?php echo $_GET["id"]; ?>">
            <div class="row">
                <label for="name" class="col-sm-2 col-form-label">Name:</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" name="name" id="name" placeholder="Name" required>
                </div>
            </div>
            <div class="row">
                <label for="mail" class="col-sm-2 col-form-label">Mail:</label>
                <div class="col-sm-10">
                    <input type="mail" class="form-control" name="mail" id="mail" placeholder="Mail">
                </div>
            </div>
            <div class="row">
                <label for="url" class="col-sm-2 col-form-label">URL:</label>
                <div class="col-sm-10">
                    <input class="form-control" type="text" id="url" name="url" placeholder="Url">
                </div>
            </div>
            <div class="row">
                <label for="Text" class="col-sm-2 col-form-label">Comments:</label>
                <div class="col-sm-10">
                    <textarea class="form-control" id="Text" name="text" rows="3" placeholder="Comment ..."
                              required></textarea>
                </div>
            </div>
            <div class="row mb-3"></div>
            <div class="row">
                <div class="col-sm-2 col-form-label"></div>
                <div class="col-sm-10">
                    <button type="submit" class="btn btn-primary" name="SubmitButton">Save</button>
                </div>
            </div>
            <div class="row mb-3"></div>
        </form>
    </div
    <div class="col-1"></div>
</div>
