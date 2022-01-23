function deleteComment(id) {
    const url = 'id=' + id;
    if (confirm("Are you sure you want to delete this comment?")) {
        AjaxRequest.get
        (
            {
                'url': encodeURI('../../src/ajax/ajax_delete_comments.php?' + url),
                'onSuccess': function success(req) {
                    const res = req.responseText;
                    document.getElementById("comment_row" + id).style.display = 'none';
                }
            }
        );
    }

}