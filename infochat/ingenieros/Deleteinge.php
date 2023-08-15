<?php 
    include "../../Db/conexion.php";

    $id = $_REQUEST['id'];

    $delete = $bd-> query("DELETE FROM ingenieros WHERE ID_ingeniero= $id;");
    $exe = $delete->execute();
   
    if ($exe == true) {
        # code...
        header("location: ../../view/admin/ingenieros.php");
    }
?>