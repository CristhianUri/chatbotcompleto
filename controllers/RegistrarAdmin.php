<?php 
    include '../Db/conexion.php';
    $nombre = $_POST['nombre'];
    $apellidos= $_POST['apellidos'];
    $email= $_POST['email'];
    $password = $_POST['password'];
    $password2= $_POST['password2'];
    // Se valida primero que la informacion del campo de password y password2 seab iguales 
    // y que no se encuentren vacios. Para realizar el registro a la base de datos
        if ($password === $password2 && $password !="" &&$password2!="" ) {
            $resgis = $bd->prepare("INSERT INTO admin (nombre ,Apellidos, contraseña, email) VALUES (?,?,?,?);");
            $execute = $resgis->execute([$nombre, $apellidos,$password, $email]);
            echo $execute;
        }
?>