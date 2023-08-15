
function llenarModal_actualizar(datos){
    d=datos.split('||');
    $("#aid").val(d[0]);
    $("#aFecha").val(d[1]);
    $("#aUsuario").val(d[2]);
    $("#aDepartamento").val(d[3]);
    $("#aDescripcion").val(d[4]);
    $("#aObservacion").val(d[5]);
   
}

function actualizar_datos(){
   var datos= $("#frm_actualizar").serialize();

    $.ajax({

        method:"POST",
        url:"../controllers/Actualiza.php",
        data: datos,
        success: function(e){

            if(e==1){
                alert("Registro Actualizado");
            }else{
                alert("Error de edicion");
            }
        }
    });

    return false;
}

function eliminar_datos(){
    
    var datos= $("#frm_actualizar").serialize();

    $.ajax({

        method:"POST",
        url:"../controllers/Eliminar.php",
        data: datos,
        success: function(e){

            if(e==1){
                alert("Registro Eliminado");
            }else{
                alert("Error");
            }
        }
    });

    return false;
}
