<?php 
include '../../Db/conexion.php';
//Esta consulta nos mostrara la información almacenada en la memoria del chatbot en tiempo real
$f1 = $_POST['f1'];
$f2 = $_POST['f2'];
$ing = $_POST['ingenieros'];
  if ($ing == "") {
    $sql = $bd->query("SELECT s.ID_Servicio, s.Fecha, s.Usuario,s.Departamento,s.Estatus,i.Nombre
      FROM servicio as s  INNER JOIN ingenieros as  i on s.ID_ingeniero = i.ID_ingeniero 
      where  s.Fecha BETWEEN '{$f1}' AND '{$f2}' AND s.Estatus='Terminado' ORDER BY Fecha ASC ");
      $id=1;
    if ($sql ->rowCount()> 0) {
        echo '<table id="example" class=" table table-bordered border-dark">
    <thead class="">
        <tr>
            <th>ID</th>
            <th>Fecha</th>
            <th>Solicitante</th>
            <th>Departamento del solicitante</th>
            <th>Ingeniero</th>
            <th>Estatus</th>
            <th>PDF</th>
        </tr>
    </thead>
    <tbody >';
      while ($servicios = $sql->fetch(PDO::FETCH_ASSOC) ) {
          # code...
          echo '<tr>
          <td>'.$id++.' </td>
          <td>'.$servicios['Fecha'].' </td>
          <td>'.$servicios['Usuario'].' </td>
          <td>'.$servicios['Departamento'].' </td>
          <td>'.$servicios['Nombre'].' </td>
          <td>'.$servicios['Estatus'].' </td>
          <td><a href="../../view/pdf.php?id='.$servicios['ID_Servicio'].' " class="btn btn-secondary"><i
          class="bi bi-filetype-pdf">PDF</i></a> </td>
          </tr>';
      }
    echo '</tbody>
    <tfoot>
        <tr>
            <th>ID</th>
            <th>Fecha</th>
            <th>Solicitante</th>
            <th>Departamento del solicitante</th>
            <th>Ingeniero</th>
            <th>Estatus</th>
            <th>PDF</th>
        </tr>
    </tfoot>
  </table>';
    } else{
        echo 'No se han realizado servicios en este perido de tiempo';
    }
  } else {
    $sql = $bd->query("SELECT s.ID_Servicio, s.Fecha, s.Usuario,s.Departamento,s.Estatus,i.Nombre
      FROM servicio as s  INNER JOIN ingenieros as  i on s.ID_ingeniero = i.ID_ingeniero where 
      s.ID_ingeniero= '{$ing}' AND Fecha BETWEEN '{$f1}' AND '{$f2}' AND s.Estatus='Terminado' 
      ORDER BY Fecha ASC ");
      $id=1;
    if ($sql ->rowCount()> 0) {
        echo '<table id="example" class=" table table-bordered border-dark">
    <thead class="">
        <tr>
            <th>ID</th>
            <th>Fecha</th>
            <th>Solicitante</th>
            <th>Departamento del solicitante</th>
            <th>Ingeniero</th>
            <th>Estatus</th>
            <th>PDF</th>
        </tr>
    </thead>
    <tbody >';
      while ($servicios = $sql->fetch(PDO::FETCH_ASSOC) ) {
          # code...
          echo '<tr>
          <td>'.$id++.' </td>
          <td>'.$servicios['Fecha'].' </td>
          <td>'.$servicios['Usuario'].' </td>
          <td>'.$servicios['Departamento'].' </td>
          <td>'.$servicios['Nombre'].' </td>
          <td>'.$servicios['Estatus'].' </td>
          <td><a href="../../view/pdf.php?id='.$servicios['ID_Servicio'].' " class="btn btn-secondary"><i
          class="bi bi-filetype-pdf">PDF</i></a> </td>
          </tr>';
      }
    echo '</tbody>
    <tfoot>
        <tr>
            <th>ID</th>
            <th>Fecha</th>
            <th>Solicitante</th>
            <th>Departamento del solicitante</th>
            <th>Ingeniero</th>
            <th>Estatus</th>
            <th>PDF</th>
        </tr>
    </tfoot>
  </table>';
    } else{
        echo 'El ingeniero seleccionado no ha realizado servicios en este perido de tiempo';
    }
  }


?>