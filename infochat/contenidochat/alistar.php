<?php
include '../../Db/conexion.php';
//Consultmaos la informacion de la memoria del chat para poder hacer modificaciones 

$sql = $bd->query("SELECT * FROM chatbot");
$resultado=$sql->fetchAll(PDO::FETCH_ASSOC);
$i =1;
                        foreach ($resultado as $row){
                         
                            echo '<form id="norespose">
                            <tr>
                            <td width="60px">'.$i++.'</td>
                                  <td>'.$row['respuestas'].'</td>
                                  <td>'.$row['preguntas'].'</td>  
                                  <td><a href="Achat.php?id='.$row['ID_chat'].'" class="btn btn-warning">Editar</a></td>
                                  <td width="100px"><a href="../../infochat/contenidochat/eliminarpre.php?id='.$row['ID_chat'].'" class="btn btn-danger">Eliminar</a></td>         
                                 </tr>
                            </form>';
                       }
?>