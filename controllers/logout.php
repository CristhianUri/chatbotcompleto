<?php 
//funcion para cerrar sesion
if (session_start()) {
    # code...
    session_destroy();
    header("Location: ../view/admin/index.php");
}
exit();
?>