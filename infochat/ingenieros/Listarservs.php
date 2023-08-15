<?php
include '../../Db/conexion.php';
//Esta consulta nos mostrara la información almacenada en la memoria del chatbot en tiempo real

          $sql = $bd->query("SELECT s.ID_Servicio, s.Usuario, s.Departamento,s.Estatus, s.Fecha,s.Hinicio,s.Hfinal,
           i.Nombre FROM servicio as s INNER JOIN ingenieros as  i    Where s.ID_ingeniero = i.ID_ingeniero ");
          $resultado=$sql->fetchAll(PDO::FETCH_ASSOC);
          $i =1;
                                  foreach ($resultado as $row){
                                   
                                      echo '<form id="norespose">
                                      <tr>
                                      <td width="40px">'.$row['ID_Servicio'].'</td>
                                      <td >'.$row['Fecha'].'</td>
                                            <td>'.$row['Usuario'].'</td>
                                            <td>'.$row['Departamento'].'</td>
                                            <td>'.$row['Nombre'].'</td>
                                            <td width="100px">'.$row['Estatus'].'</td>    
                                            <td><a href="../../view/pdf.php?id='.$row['ID_Servicio'].' 
                                            " class="btn btn-secondary"><h3><i
                                            class="bi bi-filetype-pdf"></i></h3></a> </td>
                                            <td><a href="../../infochat/ingenieros/EliminarServ.php?id='.$row['ID_Servicio'].'" class="text-break btn btn-danger" name="btn-delete" id="btn-delete"><h3><i class="bi bi-trash3-fill"></i></h3></a></td>
                                           </tr>
                                      </form>';
                                 }
                              


?>