<?php
    include "../../Db/conexion.php";
    //eliminamos todo informacion de la memoria del chat
    // pero si esta informacion fue obteniada mediante la tabla para preguntas no registradas la información se mantendra
    //en la tabla a la que esta vinculada ese apartado
    $id = $_REQUEST['id'];
    $validar= $bd->query("SELECT ID_nopregunta FROM chatbot WHERE ID_chat = $id ");
    
    $row = $validar ->fetchAll(PDO:: FETCH_ASSOC);
    
    
        # code...
       
            $epregunta = $bd ->query("DELETE FROM chatbot WHERE ID_chat= $id;");
            
            if ($epregunta == true) {
                # code...
                header("location: ../../view/admin/contenidochat.php");
            }
      
   
    
    
    /* if ($row == "") {
        # code...
        print_r($row);
    } else 
 */
?>