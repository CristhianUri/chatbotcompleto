<?php 
    include "../../Db/conexion.php";

    $id = $_REQUEST['id'];

    $delete = $bd-> query("DELETE FROM servicio WHERE ID_Servicio= $id;");
    $exe = $delete->execute();
   
    if ($exe == true) {
        # code...
        header("location: ../../view/admin/servicios.php");
    }
?>