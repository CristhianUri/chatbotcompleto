<?php 
    include "../Db/conexion.php";
 
    if (isset($_POST['id']) && !empty($_POST['id']) ) {
        # code...
        $id = $_POST['id'];
        $edifici = $bd -> prepare("SELECT * FROM departamentos Where id_edificio = ?");
        $res = $edifici -> execute([$_POST['id']]);
            $row = $edifici -> fetchAll(PDO::FETCH_ASSOC);
        $html="";
          foreach ($row as $rows) {
            # code...
            $html.= "<option value='".$rows['departamento']."'>".$rows['departamento']."</option>";
            echo $html;
          }
  

    } else {
        echo "<option value=''>Porfavor elige un departamento </option>";
    }
   
?>