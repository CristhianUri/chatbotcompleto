<?php
include '../../Db/conexion.php';
//actualizamos la informacion del PDF encaso de haber registrado mal algun dato
$id=$_POST['id'];
$nombre=$_POST['nombre'];
$img=$_POST['imagen'];

  

if (!$id=="" && !$nombre=="" ) {
    # code...
    $sentencia = $bd->prepare("UPDATE ingenieros SET Nombre=?, Firma2=? WHERE ID_ingeniero=$id;");
$resultado = $sentencia->execute([$nombre, $img]);
echo $resultado;
}



?>