<?php
include '../../Db/conexion.php';
//Esta consulta nos mostrara la información almacenada en la memoria del chatbot en tiempo real

$sql = $bd->query("SELECT * FROM ingenieros");
$resultado=$sql->fetchAll(PDO::FETCH_ASSOC);
$i =1;
                        foreach ($resultado as $row){
                         
                            echo '<form id="norespose">
                            <tr>
                            <td width="60px">'.$row['ID_ingeniero'].'</td>
                                  <td>'.$row['Nombre'].'</td>

                                  <td><img src="'. $row['Firma2'].'" alt="Imagen no insertada" width="100px" 
                                  height="auto"></td>  
                                  <td><a href="Aingenieros.php?id='.$row['ID_ingeniero'].'"
                                   class="btn btn-warning">Editar</a></td>
                                  <td ><a href="../../infochat/ingenieros/Deleteinge.php?id='.$row['ID_ingeniero'].'"
                                  id="btn_eliminar" class="btn btn-danger">Eliminar</a></td>
                                 </tr>
                            </form>';
                       }
?>