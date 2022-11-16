function init(){
}

$(document).ready(function(){  
});


/* FUNCION QUE SE EJECUTA AL RECIBIR UN CLICK EL ID btnsoporte */
$(document).on("click", "#btnsoporte", function(){

    if ($('#rol_id').val()==1) {
        $('#lbltitulo').html("Modulo Soporte TI");
        $('#btnsoporte').html("Acceso Usuario");
        $('#rol_id').val(2);
        
    }else{
        $('#lbltitulo').html("Modulo de Usuarios");
        $('#btnsoporte').html("Acceso Soporte TI");
        $('#rol_id').val(1);
        
    }

  
})


init();