<?php 
    include "../Db/conexion.php"
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://kit.fontawesome.com/a076d05399.js"></script>
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
    <link rel="stylesheet" href="../css/style.css">
    <script src="https://cdn.jsdelivr.net/npm/signature_pad@4.0.0/dist/signature_pad.umd.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/signature_pad@4.0.0/dist/signature_pad.umd.min.js"></script>
    <title>chatbot</title>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.3/jquery.min.js"></script>
</head>
<style>
#canvas {
    border: 1px solid;
}

   .wave-button{
    position: relative;
}
.wave-button::before,
.wave-button::after{
    content: "";
    position: absolute;
    top: 10px;
    left: 8px;
    width: 45px;
    height: 45px;
    border-radius: 30%;
    background-color: #0d6efd;
    opacity: 0;
    animation: onda 1.7s infinite;
}
.wave-button img{
    position: relative;
    z-index: 2;
}
@keyframes onda {
    0%{
        transform: scale(1);
    }
    15%{
        opacity: 1;
    }
    100%{
        transform: scale(2.5);
    }
}
</style>

<body>
    <a type="button" class=" wave-button" data-bs-toggle="modal" data-bs-target="#exampleModal">
       <img src="../img/robot.png" alt="">
</a>
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">
                        <h3>ChatBot <i class="bi bi-robot"></i></h3>
                    </h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="wrapper">
                        <div class="title"></div>
                        <div class="form">
                            <div class="bot-inbox inbox">
                                <div class="icon">
                                    <i class="bi bi-robot"></i>
                                </div>
                                <div class="msg-header">
                                    <p>¿Cómo puedo ayudarte?</p>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
                <div class="modal-footer">

                    <div class="input-group">
                        <input id="data" type="text" class="form-control " placeholder="Escribe algo aquí..">
                        <button id="send-btn" class="btn btn-success ">Enviar</button>

                    </div>

                </div>
            </div>
        </div>
    </div>
    <div class="modal fade" id="Modalasig" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="exampleModalLabel">Asignar ingeniero</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form method="post" id="frm_asignar" enctype="multipart/form-data">
                        <div class="row">
                            <div class="mb-3">
                                <label for="id"><strong>Nota:</strong> No cambie el valor </label>
                                <input type="text" class="form-control" placeholder="" name="id" id="id">
                            </div>
                            <div class="mb-3 ">
                                <label for="dep">
                                    Departamento
                                </label>
                                <input type="text" class="form-control" placeholder="" name="dep" id="dep" disabled>
                            </div>
                            <?php 
                                $select = $bd -> query("SELECT* FROM ingenieros ");
                                $row = $select -> fetchAll(PDO:: FETCH_ASSOC); 
                            ?>
                            <div class="mb-3 ">
                                <label for="ingenieros">
                                    Selecciona a un ingeniero
                                </label>
                                <select class="form-select" name="ingenieros" id="ingenieros">
                                    <option value="" dissabled>Selecciona ingeniero </option>
                                    <?php 
                                                if ($select->rowCount()>0) {
                                                      foreach ($row as $rows) {   
                                        ?>
                                    <option value="<?php echo $rows['ID_ingeniero'] ?>"><?php echo $rows['Nombre']?>
                                    </option>
                                    <?php          }
                                                }
                                        ?>
                                </select>
                            </div>
                            <div class="mb-3 ">
                                <label for="Hinicio">
                                    Escribe la hora
                                </label>
                                <input type="text" class="form-control" placeholder="" name="Hinicio" id="Hinicio">
                            </div>
                            <div class="mb-3 ">
                                <input type="text" hidden value="Asignado" class="form-control" placeholder=""
                                    name="estatus" id="estatus">
                            </div>
                            <div class="mb-3">
                                <button type="submit" class="btn btn-success" name="submit2"
                                    id="submit2">Guardar</button>
                            </div>
                        </div>
                    </form>

                </div>
                <div class="modal-footer">

                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="Modalr" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="exampleModalLabel">Terminar servicio</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form method="post" id="frm_terminar" enctype="multipart/form-data">
                        <div class="row">
                            <div class="mb-3">
                                <label for="id"><strong>Nota:</strong> No cambie el valor </label>
                                <input type="text" class="form-control" placeholder="" name="id" id="id">
                            </div>
                            <div class="mb-3 ">
                                <label for="dep">
                                    Departamento
                                </label>
                                <input type="text" class="form-control" placeholder="" name="dep" id="dep" disabled>
                            </div>
                            <div class="mb-3 ">
                                <label for="dep">
                                    Escribe la hora en la que finalizo el servicio
                                </label>
                                <input type="text" class="form-control" placeholder="" name="Hfinal" id="Hfinal">
                            </div>
                            <div class="mb-3">
                                <label for="observacion"><strong>Nota:</strong>Escriba "Sin observaciones" si no tiene ninguna observacion que realizar</label>
                                    <textarea type="text" class="form-control"
                                        placeholder="Ingrese un observacion que quiera realizar" name="observacion"
                                        id="observacion"></textarea>
                                </div>
                            <div class="mb-3 ">
                                <input type="text" hidden value="Terminado" class="form-control" placeholder=""
                                    name="estatus" id="estatus">
                            </div>
                            <div class="mb-3">
                                <button type="submit" class="btn btn-success" name="submitT"
                                    id="submitT">Guardar</button>
                            </div>
                        </div>
                    </form>

                </div>
                <div class="modal-footer">

                </div>
            </div>
        </div>
    </div>


    <!-- Modal -->
    <?php 
        $edificio = $bd->query("SELECT * FROM edificios");
        $res = $edificio ->fetchAll(PDO::FETCH_ASSOC);
    ?>

    <div class="modal fade" id="form" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="exampleModalLabel">Solicitar servicio</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="container mt-2">
                        <h2>Registro</h2>
                        <p>Favor de insertar los datos solicitados correctamente </p>
                        <form method="post" id="frm_registrar" enctype="multipart/form-data">
                            <div class="row">
                                <div class="col-6 ">
                                    <input type="text" class="form-control" placeholder="Ingrese su nombre"
                                        name="usuario" id="usuario">
                                </div>
                                <div class="col-6 ">
                                <select class="form-select" aria-label="Default select example" name="edificio"
                                        id="edificio">
                                        <option value="" selected>Selecciona un edificio</option>
                                        <?php 
                                            if ($edificio->rowCount()>0) {
                                                foreach ($res as $resultado) {
                                                
                                        ?>
                                        <option value="<?php echo $resultado['id'] ?>" ><?php echo $resultado['edificio'] ?></option>
                                        <?php
                                                }
                                            }
                                        ?>
                                        
                                    </select>
                                </div>
                                <div class="col-6 mt-2 ">
                                <select class="form-select" name="departamento" id="departamento">
                                    </select>
                                </div>
                                <div class="col-6 mt-2">
                                    <textarea type="text" class="form-control"
                                        placeholder="Ingrese la descripcion del problema" name="descripcion"
                                        id="descripcion"></textarea>
                                </div>
                                <div class="col-6 mt-2">
                                    <input type="text" class="form-control" placeholder="Tipo de servicio"
                                        name="servicio" id="servicio">
                                </div>
                                <div class="col-6 mt-2">
                                    <input type="date" class="form-control" placeholder="" name="fecha" id="fecha">
                                </div>
                                <div class="col-6 mt-2">
                                    <input type="text" hidden class="form-control" value="No asignado"
                                        placeholder="Estatus" name="estatus" id="estatus">
                                </div>
                                <div class="col-6 mt-2">
                                    <input type='hidden' name='imagen' id='imagen' />
                                </div>
                                
                                <div class="col-6 mt-2">
                                    <button type="submit" class="btn btn-success" name="submit" id="submit"
                                        onclick='GuardarTrazado()'>Guardar</button>
                                </div>
                            </div>
                        </form>
                        <div class="col-6 mt-2">
                            <label for='canvas'><strong>Firma aqui</strong></label>
                        </div>
                        <canvas class="mt-3" id='canvas' width="350" height="100" style='border: 1px solid #black;'>
                            <p>Tu navegador no soporta canvas</p>
                        </canvas>
                        <div class="col-12">
                            <button type="button" class="btn btn-primary" onclick='limpiar()'>limpiar</button>
                        </div>

                    </div>
                </div>
                <div class="modal-footer">

                    <button type="button" class="btn btn-primary" name="clear" id="clear">limpiar</button>

                </div>
            </div>
        </div>
    </div>


    <script>
        $('#Modalasig').on('show.bs.modal', function(event) {
        var etiqueta = $(event.relatedTarget)
        var id = etiqueta.data('id')
        var dep = etiqueta.data('dep')

        var modal = $(this)
        //Guardamos el resultado en un input dentro del modal de nombre mnombre
        modal.find('.modal-body #id').val(id)
        modal.find('.modal-body #dep').val(dep)
        })
    </script>
    <script>
        $('#Modalr').on('show.bs.modal', function(event) {
        var etiqueta = $(event.relatedTarget)
        var id = etiqueta.data('id')
        var dep = etiqueta.data('dep')

        var modal = $(this)
        //Guardamos el resultado en un input dentro del modal de nombre mnombre
        modal.find('.modal-body #id').val(id)
        modal.find('.modal-body #dep').val(dep)
        })
    </script>
    <script>
     $('#form').on('show.bs.modal', function(event) {
        $("#usuario ").val("");
        $("#departamento ").val("");
        $("#descripcion ").val("");
        $("#observacion ").val("");
        $("#servicio ").val("");
        $("#fecha ").val("");
        });
    </script>
    <script>
     $('#Modalasig').on('show.bs.modal', function(event) {
        $("#nombre ").val("");
        $("#ingenieros").val("Selecciona un ingeniero");
        $("#Hinicio ").val("");

        });
    </script>
    <script>
        $('#Modalr').on('show.bs.modal', function(event) {
        $("#Hfinal ").val("");
        $("#observacion ").val("");

        });
    </script>
    <script>
        function el(el) {
        return document.getElementById(el);
        }

        el("data").addEventListener("input", function() {
        el("send-btn").disabled = Boolean(this.value.length <= 0);
        });
    </script>

    <script>
        $(document).ready(function() {
        $("#send-btn").on("click", function() {
            $value = $("#data").val();
            $msg = '<div class="user-inbox inbox"><div class="msg-header"><p class="text-break">' +
                $value +
                '</p></div></div>';
            $(".form").append($msg);
            $("#data").val('');
            $.ajax({
                url: '../controllers/message.php',
                type: 'POST',
                data: 'text=' + $value,
                success: function(result) {
                    $replay =
                        '<div class="bot-inbox inbox"><div class="icon"><i class="bi bi-robot"></i></div><div class="msg-header"><p class="text-break">' +
                        result + '</p></div></div></br>';
                    $(".form").append($replay);
                    $(".form").scrollTop($(".form")[0].scrollHeight);
                }
            });
        });
        });
    </script>
    <script type="text/javascript">
        $(document).ready(function() {
        $(document).on('submit', '#frm_registrar', function() {
            //Obtenemos datos.
            var data = $(this).serialize();
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
        $('#submit2').click(function(e) {
            var data = $('#frm_asignar').serialize();
            $.ajax({
                type: "POST",
                url: "../infochat/ingenieros/SelectIngenieros.php",
                data: data,
                success: function(data) {
                    if (data == 1) {
                        alert("Ingeniero asignado");
                    } else {
                        alert("LLene los campos solicitados");
                    }
                }
            })
            return false;
        })
    })
    </script>
    <script type="text/javascript">
    $(document).ready(function() {
        $('#submitT').click(function(e) {
            var data = $('#frm_terminar').serialize();
            $.ajax({
                type: 'POST',
                url: '../infochat/ingenieros/Terminar.php',
                data: data,
                success: function(data) {
                    if (data == 1) {
                        alert("Servicio terminado");
                    } else {
                        alert("Llene todos los campos solicitados");
                    }
                }
            })
            return false;
        })
    })
    </script>
    <script type="text/javascript">
    $(document).ready(function(e) {
        $("#edificio").change(function(){
            var data = "id="+ $("#edificio").val();    
            $.ajax({
                type: "POST",
                url: "../controllers/departamentos.php",
                data: data,
            success: function (response){
                $("#departamento").html(response);
            },
            error: function(){
                alert("error");
            }
            })
        });
    });
</script>
    <script type="text/javascript">
    function limpiar() {
        var canvas = document.getElementById("canvas");
        var ctx = canvas.getContext("2d");
        // Borramos el área que nos interese
        ctx.clearRect(0, 0, canvas.width, canvas.height);
    }
    </script>



    <!-- b5 -->
    <script src="../ajax/canvas.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <!--  js b5 -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"
        integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js"
        integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous">
    </script>
</body>

</html>