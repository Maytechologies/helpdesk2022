$(document).ready(function() {
    $('#ticket_descrip').summernote();


    $.post("../../controller/categoria.php?op=combo", function(data, status){
        $('#cat_id').html(data);
    })
});