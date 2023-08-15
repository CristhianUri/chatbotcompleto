<?php 
include '../../Db/conexion.php';
//actualizamos la informacion del PDF encaso de haber registrado mal algun dato
$id=$_POST['id'];
$observacion = $_POST['observacion'];
$est=$_POST['estatus'];
$Hfinal =$_POST['Hfinal'];

if (  !$observacion=="" && !$est=="" && !$Hfinal=="") {
    $sentencia = $bd->prepare("UPDATE servicio SET Observacion=?, Hfinal=?,Estatus=?  WHERE ID_Servicio=$id;");
    $resultado = $sentencia->execute([$observacion,$Hfinal,$est]);
    echo $resultado;
}

?>
