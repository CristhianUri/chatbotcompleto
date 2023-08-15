<?php 
    include '../../Db/conexion.php';
    //controlador encargado de insertar datos para crear un pdf de servicio de soporte
    $nombre=$_POST['nombre'];
    
   /*  $tpm_name = $_FILES['file']['tmp_name'];
    $ext_img = pathinfo($tpm_name, PATHINFO_EXTENSION);
    $data = file_get_contents($tpm_name);
    $img_base64 = base64_encode($data);
    $img = 'data:image/'.$ext_img.';base64,'.$img_base64; */
    $img =$_POST['imagen'];

    /* $query = $bd-> prepare("INSERT INTO servicio (Fecha,Usuario, Departamento, Descripcion, Observacion,Servicio,Estatus,Firma) VALUES (?,?,?,?,?,?,?,?);");
    $execute = $query -> execute([$fecha,$usuario, $departamento,$descripcion,$observacion,$servicio,$estatus,$img]);
    echo $execute; */
   if( !$nombre==""  ){
    $query = $bd-> prepare("INSERT INTO ingenieros (Nombre,Firma2) VALUES (?,?);");
    $execute = $query -> execute([$nombre,$img]);
    echo $execute;
    }
    

?>