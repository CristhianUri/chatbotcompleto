<?php 
    include "../Db/conexion.php";
    $email = $_POST['email'];
    $pasword= $_POST['password'];
    //veridicamos que el email y contraseña no este vacia 
    if ($email=="" && $password=="") {
        header("location: ../view/admin/index.php?vacio=false");
    } else{
        // si no esta vacio buscamos el email y la contraseña en la base de datos.
        $valid = $bd->prepare("SELECT email, contraseña FROM admin WHERE email=? AND contraseña= ?;");
        $execute =$valid->execute([$email, $pasword]);
        $resul = $valid->fetchAll(PDO::FETCH_ASSOC);
       if ($valid -> rowCount()) {
        foreach ($resul as $row) {
            //validamos que el email y contraseña sean iguales a los resultados de la busqueda.
            if ($row['email']===$email && $row['contraseña']===$pasword) {
                # code...
                //si se cumple iniciamos sesion
                session_start();
                $_SESSION['email']= $email;
                header("location: ../view/admin/admin.php");
            }
        }
       } else{
        header("location: ../view/admin/index.php?error=false");
       }
    }
?>