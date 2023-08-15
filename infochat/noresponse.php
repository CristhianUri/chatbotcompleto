<?php
include '../Db/conexion.php';
//Esta consulta es usada para generar la tabla del apartado de preguntas no registradas para poder visualizar
//los cambios en tiempo real

$sql = $bd->query("SELECT * FROM noregistrada");
$resultado=$sql->fetchAll(PDO::FETCH_ASSOC);
$i =1;
                        foreach ($resultado as $row){
                            echo '<tr>
                            <td width="auto">'.$i++. '</td>
                                  <td>'.$row['respuestas2'].'</td>
                                  <td>'.$row['preguntas2'].'</td>
                                  <td><a href="Actualizar.php?id='.$row['ID_nopregunta'].'" class="btn btn-warning">Editar</a></td>
                                  <td><a href="../../infochat/eliminar.php?id='.$row['ID_nopregunta'].'" class="btn btn-danger">Eliminar</a></td>
                     
                                 </tr>';
                       }
?>