function init(){
    $("#ticket_form").on("submit", function(e){
        guardaryeditar(e);
    });
}

$(document).ready(function() {
    $('#tick_descrip').summernote({
        height:150,
        lang: "es-ES",
        callbacks:{
            OnImageUpload: function(imagen){
                console.log("Imagen detec..");
                myimagetreat(image[0]);
            },
            onPaste: function(e){
                console.log("Text detect..");
            }
        },
        toolbar: [
            ['style', ['bold', 'italic', 'underline', 'clear']],
            ['font', ['strikethrough', 'superscript', 'subscript']],
            ['fontsize', ['fontsize']],
            ['color', ['color']],
            ['para', ['ul', 'ol', 'paragraph']],
            ['height', ['height']]
        ]
    });
    
    /* TODO:Mostramos el listado de categorias */
    $.post("../../controller/categoria.php?op=combo", function(data, status){
        $('#cat_id').html(data);
    })
});

function guardaryeditar(e){

    e.preventDefault();
    var formData = new FormData($("#ticket_form")[0]);

    /* TODO:Validamos que los campos del formulario nuevo ticket no lleguen vacios */
    if($('#tick_descrip').summernote('isEmpty') || $('#tick_titulo').val()==''){

        swal.fire({
            icon: 'warning',
            title: 'Campos Faltantes',
            text:'En el registro',
            showConfirmButton: false,
            timer: 1500
        });
    
     }else{
        $.ajax({
            url:"../../controller/ticket.php?op=insert",
            type:"POST",
            data:formData,
            contentType:false,
            processData:false,
            success: function(data){
                console.log(data); 
            
                $('#tick_titulo').val('');
                $('#tick_descrip').summernote('reset');

                swal.fire({
                    icon: 'success',
                    title: 'Ticket Registrado',
                    text:'En el sistema',
                    showConfirmButton: false,
                    timer: 1500
                });


                
            }

        });

}


   
}

init();