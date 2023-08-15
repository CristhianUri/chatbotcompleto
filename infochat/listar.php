<?php
include '../Db/conexion.php';
//Esta consulta nos mostrara la información almacenada en la memoria del chatbot en tiempo real

$sql = $bd->query("SELECT * FROM chatbot");
$resultado=$sql->fetchAll(PDO::FETCH_ASSOC);
$i =1;
                        foreach ($resultado as $row){
                         
                            echo '<form id="norespose">
                            <tr>
                            <td width="60px">'.$i++.'</td>
                                  <td>'.$row['preguntas'].'</td> 
                                  <td>'.$row['respuestas'].'</td>
                                   
                                  
                                 </tr>
                            </form>';
                       }
?>