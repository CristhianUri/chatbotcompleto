<?php
include "../../Db/conexion.php";
//Actualizamos la infomación almacenada en la memoria del chat
    $id = $_POST['id'];
    $resposne = $_POST['responses'];
    $queries = $_POST['queries'];

    $update = $bd -> prepare("UPDATE chatbot SET respuestas=? , preguntas=? WHERE ID_chat = $id;");
    $action = $update ->execute([$resposne, $queries]);



    if ($action == true) {
        # code...
        header("location: ../../view/admin/contenidochat.php");
    }

?>