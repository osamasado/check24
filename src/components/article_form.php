<?php
?>
<div class="row mt-3">
    <div class="col-2"></div>
    <div class="col-8 bg-info">
        <div class="row mb-3"></div>
        <form method="post" action="#" enctype="multipart/form-data">
            <input type="hidden" id="author" name="author" value="<?php echo $_SESSION["username"];?>">
            <div class="row">
                <label for="inputTitle" class="col-sm-2 col-form-label">Title:</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" name="title" id="Title" placeholder="Title" required>
                </div>
            </div>
            <div class="row">
                <label for="attachment" class="col-sm-2 col-form-label">Link to image:</label>
                <div class="col-sm-10">
                    <input class="form-control" type="text" id="attachment" name="attachment" required value="https://via.placeholder.com/200x100?text=Article-Picture">
                </div>
            </div>
            <div class="row">
                <label for="editor" class="col-sm-2 col-form-label">Text:</label>
                <div class="col-sm-10">
                    <textarea class="form-control" id="editor" name="text" rows="3" placeholder="Article Text ..." required></textarea>
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
    <div class="col-2"></div>
</div>
<script src="https://cdn.tiny.cloud/1/no-api-key/tinymce/5/tinymce.min.js" referrerpolicy="origin"></script>

<script>
    tinymce.init({
        selector: 'textarea#editor',
        menubar: false
    });
</script>
