<?php 
include '../Db/conexion.php';

$id=$_REQUEST['id'];
//Realizamos la eliminacion de la pregunta para usar la restriccin en cascada para eliminar autimatiamente la 
//información de la memoria del chat

$sentencia = $bd ->query("DELETE FROM noregistrada WHERE ID_nopregunta= $id;");
$resultado = $sentencia->execute();
if ($resultado == true) {
    # code...
    header("location: ../view/admin/dash.php");
} else{
    header("location: ../view/admin/dash.php?message=fallo");
}
echo $resultado;

?>