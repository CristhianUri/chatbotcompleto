<?php 
    include '../Db/conexion.php';
    //controlador encargado de insertar datos para crear un pdf de servicio de soporte
    $usuario=$_POST['usuario'];
    $departamento=$_POST['departamento'];
    $descripcion=$_POST['descripcion'];

    $estatus=$_POST['estatus']; 
    $servicio=$_POST['servicio'];
    $fecha = $_POST['fecha'];
    
    $img =$_POST['imagen'];

   if( !$fecha=="" && !$usuario=="" && !$departamento=="" && !$descripcion==""  && !$estatus=="" && !$servicio==""){
    $query = $bd-> prepare("INSERT INTO servicio (Departamento, Descripcion, Usuario,Firma,Fecha, servicio, Estatus) VALUES (?,?,?,?,?,?,?);");
    $execute = $query -> execute([$departamento, $descripcion ,$usuario,$img,$fecha,$servicio,$estatus]);
    echo $execute;
    }
    

?>