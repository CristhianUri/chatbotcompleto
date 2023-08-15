<?php
include '../Db/conexion.php';

$id=$_POST['id'];
$response2=$_POST['response2'];
$queries2=$_POST['queries2'];
//consultamos el id de la pregunta para ver si ya hemos modificado una vez la informacion
$validar = $bd ->query("SELECT ID_nopregunta FROM chatbot WHERE ID_nopregunta = $id");

$resultado=$validar->fetchAll(PDO::FETCH_ASSOC);
if ($resultado == true) {
    # code..
    //si el resultado es verdadero no permitimos volver a modificar desde la vista de preguntas no registradas
    header("location:../view/admin/dash.php?mensaje=true");
    
} else{
    if (!$response2==""  ) {
        # code...
    // si la respuesta no se envia vacia hacemos una actualizacion a la tabla
    $sentencia = $bd->prepare("UPDATE noregistrada SET respuestas2=? ,  preguntas2=? WHERE ID_nopregunta=$id;");
    $resultado = $sentencia->execute([$response2, $queries2]);
    
    echo $resultado;
    
        # code...
        /// despues hacemos un inner join a la tabla del chatbot para insertar  la informacion de la tabla noresponse 
        // previamente actualizada
        $insertar = $bd->prepare("INSERT INTO chatbot(respuestas,preguntas,ID_nopregunta )
    select  n.respuestas2 , n.preguntas2 ,n.ID_nopregunta
    from noregistrada as n
    WHERE ID_nopregunta=$id;");
    $res = $insertar->execute();
    header("location:../view/admin/dash.php");
    
    }else{
       header("location:../view/admin/dash.php");
    }
}




?>