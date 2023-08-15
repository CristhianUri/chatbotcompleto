<?php
// conectando a la base de datos
include '../Db/conexion.php';
// obteniendo el mensaje del usuario a través de ajax
$getMesg =  $_POST['text'];

$ing = $bd ->query("SELECT ID_ingeniero FROM ingenieros WHERE ID_ingeniero = '$getMesg';");
$info = $ing ->fetchAll(PDO::FETCH_ASSOC);
   
if (!$getMesg=="") {
    //comprobando la consulta del usuario a la consulta de la base de datos
    $check_data = $bd->query("SELECT respuestas FROM chatbot WHERE preguntas LIKE '%$getMesg%'");
    $check_data -> execute();
    //recuperando la reproducción de la base de datos de acuerdo con la consulta del usuario
    $data = $check_data->fetchAll(PDO:: FETCH_ASSOC);
    $i=1;
    // si la consulta del usuario coincide con la consulta de la base de datos, mostraremos la respuesta; de lo contrario, irá a otra declaración
    if ($check_data -> rowCount()) {
        foreach ($data as $datos) {
        //almacenando la respuesta a una variable que enviaremos a ajax
            $replay = $datos['respuestas'];
            echo $replay;
            }
    }
    // esta parte del codigo se encarga de buscar los servicios asigados
    // de todos los ingenieros registrados por el administrador. 
    elseif($ing ->rowCount()>0) {
        foreach ($info as $inf) {
            switch ($getMesg) {
                case $inf['ID_ingeniero']:
                    $nombre = $bd -> query("SELECT Nombre from ingenieros Where ID_ingeniero = $getMesg ;");
                    foreach ($nombre as $name) {
                     $replay2 ='Estos son los servicios son del:<br>ING. '.' '.$name['Nombre'];
                    echo $replay2;
                }
                $query = $bd ->query("SELECT * FROM servicio   WHERE ID_ingeniero = $getMesg 
                AND Estatus = 'Asignado'");
                $ing = $query -> fetchAll(PDO::FETCH_ASSOC);                                  
                    if ($ing ==true) {
                     foreach ($ing as $ing2) {
                        $replay2 = '</br><a href="pdf.php?id='.$ing2['ID_Servicio'].'
                        " target="_blank" class="text-white" >'.$ing2['ID_Servicio'].''." ".'
                        '.$ing2['Departamento'].'</a>';
                            echo $replay2;   
                    }
                      }else{
                            echo '<br>No tienes ningun servicio asignado';
                    }
                break;
                default:
                    # code...
                    break;
            }
        } 
    } 
    else {
        //Mediante el switch esperamos palabras claves para realizar determinadas acciones
      switch ($getMesg) {
            case 'No asignados':
            case 'no asignados':
                $qr = $bd->query("SELECT ID_Servicio, Departamento FROM `servicio` WHERE Estatus = 'No asignado'");
                $q = $qr ->fetchAll(PDO::FETCH_ASSOC);
                if ($q == true) {
                    echo 'Estos son los servicios sin un ingeniero asignado ';
                    foreach ($q as $q2) {
                        $replay2 ='</br><a href="#" class="text-white" data-bs-target="#Modalasig" data-id="'. $q2['ID_Servicio'].'" data-dep="'.$q2['Departamento'].'"  data-bs-toggle="modal" id="">
                        '.$q2['ID_Servicio'].'' ." ".' '.$q2['Departamento'].'
                      </a>';               
                      echo $replay2;
                    }
                } else {
                    echo 'No hay servicios sin asignar por el momento';
                }
                
          
                break;
               
                case 'quiero solicitar un servicio':
                case 'Quiero solicitar un servicio' :
                    # code...
                    $replay2 = 'Para solicitar un servicio al departamento de coordinación de informatica y sistemas llena el siguiente formulario
                    <a href="#" class=" text-white" data-bs-toggle="modal" data-bs-target="#form">
                   Presiona aqui
                  </a>';
               echo $replay2;
                    break;
                        case 'Terminar servicio':
                $qr = $bd->query("SELECT ID_Servicio, Departamento FROM `servicio` WHERE Estatus = 'Asignado'");
                $q = $qr ->fetchAll(PDO::FETCH_ASSOC);
                echo 'Por favor elige el servicio deseas terminar';
                foreach ($q as $q2) {    
                $replay2 =' </br><a href="#" class="text-white" data-bs-target="#Modalr" 
                data-id="'. $q2['ID_Servicio'].'" data-dep="'.$q2['Departamento'].'"  
                data-bs-toggle="modal" id="">
                '.$q2['ID_Servicio'].'' ." ".' '.$q2['Departamento'].'
              </a>';               
              echo $replay2;}
                        break;
            default:
                # code...
                echo "¡Lo siento, no tengo una respuesta a esa pregunta por el momento";
        
        //con este query almacenamos las preguntas que no contemplamos en la tabla noresponse
        $query = $bd-> prepare("INSERT INTO noregistrada (preguntas2) VALUES (?);");
        $execute = $query -> execute([$getMesg]);
                
                break;
        }
               
       
        
    }
    
} else {

    echo "Porfavor ingresa una pregunta";
}

?>