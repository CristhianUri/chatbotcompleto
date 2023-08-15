<?php
include "../../Db/conexion.php";

$pregunta = $_POST['pregunta'];
$respuesta = $_POST['respuesta'];

if (!$respuesta == "" && !$pregunta =="") {
    # code...
    $insert = $bd -> prepare("INSERT INTO  chatbot (preguntas, respuestas)  VALUES  (?,?);");
    $exe = $insert -> execute([$pregunta, $respuesta]);
    echo $exe;
}
?>