<?php
include '../../Db/conexion.php';
//actualizamos la informacion del PDF encaso de haber registrado mal algun dato
$id=$_POST['id'];
$ing=$_POST['ingenieros'];
$est=$_POST['estatus'];
$Hinicio =$_POST['Hinicio'];

if (!$ing=="" && !$Hinicio=="") {
  # code...
    $sentencia = $bd->prepare("UPDATE servicio SET  Hinicio=?,Estatus=?, ID_ingeniero=?  WHERE ID_Servicio=$id;");
    $resultado = $sentencia->execute([$Hinicio,$est,$ing]);
    echo $resultado;
}



?>