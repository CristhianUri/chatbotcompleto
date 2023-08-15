<?php 
include "../Db/conexion.php";
$sentencia = $bd->query("SELECT * FROM servicio");
$resultados = $sentencia->fetchAll(PDO::FETCH_NUM);


?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"
        integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js"
        integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous">
    </script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.2.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
    <script src="../ajax/funciones.js"></script>
    <script src="../js.js"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.js"
        integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script>
    <script src="../js/jquery-3.6.0.min.js"></script>

    <script src="https://cdn.jsdelivr.net/npm/signature_pad@4.0.0/dist/signature_pad.umd.min.js"></script>
    <title>Formulario para rellenar PDF</title>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.3/jquery.min.js"></script>
</head>
<style>
#canvas {
    border: 1px solid;
}
</style>

<body>
    <div class="position-relative">
        <div class="position-absolute top-0 end-0">
            <a href="chat.php" class="btn btn-info">
                <h5><i class="bi bi-arrow-left-square"></i> </h5>
            </a>
        </div>
    </div>
    <div class="container mt-3">
        <h2>Registro</h2>
        <p>Favor de insertar los datos solicitados correctamente </p>
        <form method="post" id="frm_registrar" enctype="multipart/form-data">
            <div class="row">
                <div class="col-6">
                    <input type="text" class="form-control" placeholder="usuario" name="usuario">
                </div>
                <div class="col-6 ">
                    <input type="text" class="form-control" placeholder="Departamento" name="departamento">
                </div>
                <div class="col-6 mt-2">
                    <input type="text" class="form-control" placeholder="descripción" name="descripcion">
                </div>
                <div class="col-6 mt-2">
                    <input type="text" class="form-control" placeholder="observacion" name="observacion">
                </div>
                <div class="col-6 mt-2">
                    <input type="text" class="form-control" placeholder="Estatus" name="estatus">
                </div>
                <div class="col-6 mt-2">
                    <input type="text" class="form-control" placeholder="servicio" name="servicio">
                </div>
                <div class="col-6 mt-2">
                    <input type="date" class="form-control" placeholder="" name="fecha">
                </div>
                <div class="col-6 mt-2">
                    <input type='' hidden name='imagen' id='imagen' />
                </div>
                <div class="col-6 mt-2">
                    <button type="submit" class="btn btn-success" name="submit" id="submit"
                        onclick='GuardarTrazado()'>Guardar</button>
                </div>
            </div>
        </form>
        <canvas class="mt-3" id='canvas' width="350" height="200" style='border: 1px solid #black;'>
            <p>Tu navegador no soporta canvas</p>
        </canvas>
        <div class="col-12">
            <button type="button" class="btn btn-primary" name="limpiar" id="limpiar">limpiar</button>
        </div>

    </div>

  
    <div class="container">
        <div class="row">
            <table class="table mt-4 table-bordered border-dark" id="tabla">
                <thead>
                    <tr>
                        <th scope="col">id</th>
                        <th scope="col">Fecha </th>
                        <th scope="col">Usuario</th>
                        <th scope="col">Departamento</th>
                        <th scope="col">Descripción</th>
                        <th scope="col">Observación</th>
                        <th scope="col">firma</th>
                        <th scope="col">Acciones</th>
                        <th>doc</th>

                    </tr>
                </thead>
                <?php
                 $i=1;
        foreach ($resultados as $resultado) {
           
            $datos=$resultado[0]."||".
            $resultado[1]."||".
            $resultado[2]."||".
            $resultado[3]."||".
            $resultado[4]."||".
            $resultado[5]."||".
            $resultado[8];
    ?>

                <tbody>
                    <tr>
                        <th scope="row"><?php echo $i++?></th>
                        <td><?php echo $resultado[1]?> </td>
                        <td><?php echo $resultado[2]?></td>
                        <td><?php echo $resultado[3]?></td>
                        <td><?php echo $resultado[4]?></td>
                        <td><?php echo $resultado[5]?></td>
                        <td><img src="<?php echo $resultado[7]?>" alt="Imagen no insertada" width="100px"
                                height="80px"></td>
                        <td><button type="button" class="btn btn-warning" id="ver_modal" data-bs-toggle="modal"
                                data-bs-target="#exampleModal"
                                onclick="llenarModal_actualizar('<?php echo $datos?>');">Editar</button></td>
                        <td><a href="pdf.php?id=<?php echo $resultado[0];?> " class="btn btn-secondary"><i
                                    class="bi bi-filetype-pdf">PDF</i></a></td>
                    </tr>
                </tbody>
                <?php 
        }
    ?>
            </table>


        </div>
    </div>


    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-scrollable">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Actualizar informacion</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form id="frm_actualizar" method="post">
                        <div class="mb-3">
                            <label for="aid" class="form-label">id</label>
                            <input type="text" class="form-control" name="aid" value="" id="aid" placeholder="">
                        </div>
                        <div class="mb-3">
                            <label for="aFecha" class="form-label">Fecha</label>
                            <input type="text" class="form-control" name="aFecha" value="" id="aFecha" placeholder="">
                        </div>
                        <div class="mb-3">
                            <label for="aUsuario" class="form-label">Usuario</label>
                            <input type="text" class="form-control" name="aUsuario" value="" id="aUsuario"
                                placeholder="">
                        </div>
                        <div class="mb-3">
                            <label for="aDepartamento" class="form-label">Departamento</label>
                            <input type="text" class="form-control" name="aDepartamento" value="" id="aDepartamento"
                                placeholder="">
                        </div>
                        <div class="mb-3">
                            <label for="aDescripcion" class="form-label">Observacion</label>
                            <input type="text" class="form-control" name="aDescripcion" value="" id="aDescripcion"
                                placeholder="">
                        </div>
                        <div class="mb-3">
                            <label for="aObservacion" class="form-label">Observacion</label>
                            <input type="text" class="form-control" name="aObservacion" value="" id="aObservacion"
                                placeholder="">
                        </div>
                        <div class="mb-3 mt-3">
                            <button type="submit" name="btn_editar" id="btn_editar"
                                class="btn btn-primary">Actualizar</button>
                        </div>
                        <div class="mb-3 mt-3">
                            <button type="submit" name="btn_eliminar" id="btn_eliminar"
                                class="btn btn-danger">Eliminar</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>



    

    <script type="text/javascript">
    $(document).ready(function() {
        $(document).on('submit', '#frm_registrar', function() {

            //Obtenemos datos.
            var data = $(this).serialize();
            console.log(data);
            $.ajax({
                type: 'POST',
                url: "../controllers/Insert.php",
                data: new FormData(this),
                contentType: false,
                cache: false,
                processData: false,

                success: function(data) {
                    if (data == 1) {
                        alert('Datos Registrados');
                    } else {
                        alert('Error de registro');
                    }
                }
            });

            return false;
        });
    });
    </script>
    <script type="text/javascript">
    $(document).ready(function() {
        $("#frm_registrar").on('submit', function(e) {

            e.preventDefault();
            agregar_datos();

        });
    });
    </script>
    <script type="text/javascript">
    $(document).ready(function() {
        $("#btn_editar").on('click', function(e) {
            e.preventDefault();
            actualizar_datos();
        });
    });
    </script>
    <script type="text/javascript">
    $(document).ready(function() {
        $("#btn_eliminar").on('click', function(e) {

            e.preventDefault();
            eliminar_datos();
        });
    });
    </script>
    <script type="text/javascript">
    $(document).ready(function() {
        $("#limpiar").on('click', function(e) {

            e.preventDefault();
            LimpiarTrazado();
        });
    });
    </script>
    
<script src="../ajax/canvas.js"></script>
    <script src="jquery.min.js"></script>
    <script src="signature_pad.js"></script>
    <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
    <script src="https://cdn.datatables.net/1.13.4/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.13.4/js/dataTables.bootstrap4.min.js"></script>
</body </html>