
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title>Register - SB Admin</title>
    <link href="../css/styles.css" rel="stylesheet" />
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.3/jquery.min.js"></script>
    <script src="https://use.fontawesome.com/releases/v6.3.0/js/all.js" crossorigin="anonymous"></script>
</head>

<body class="bg-primary">
    <div id="layoutAuthentication">
        <div id="layoutAuthentication_content">
            <main>
                <div class="container">
                    <div class="row justify-content-center">
                        <div class="col-lg-7">
                            <div class="card shadow-lg border-0 rounded-lg mt-5">
                                <div class="card-header text-center">
                                    <h3 class="text-center font-weight-light my-4">Registrarse</h3>
                                    <?php
            if (isset($_REQUEST["menssage"]) && $_REQUEST["menssage"] == 'true') {
                echo "<div><h6 style='color:green'> Administrador registrado</h6> </div>";
            }
            ?>
                                    <?php
            if (isset($_REQUEST["error"]) && $_REQUEST["error"] == 'false') {
                echo "<div><h6 style='color:red'> El correo ya existe</h6> </div>";
            }
            ?>
                                </div>

                                <div class="card-body">
                                    <form id="frm_usuario" method="POST">
                                        <div class="row mb-3">
                                            <div class="col-md-6">
                                                <div class="form-floating mb-3 mb-md-0">
                                                    <input class="form-control" id="nombre" name="nombre" type="text"
                                                        placeholder="" />
                                                    <label for="nombre">Nombre</label>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-floating">
                                                    <input class="form-control" id="apellidos" name="apellidos"
                                                        type="text" placeholder="" />
                                                    <label for="apellidos">Apellidos</label>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-floating mb-3">
                                            <input class="form-control" id="email" name="email" type="email"
                                                placeholder="" />
                                            <label for="email">Email</label>
                                        </div>
                                        <div class="row mb-3">
                                            <div class="col-md-6">
                                                <div class="form-floating mb-3 mb-md-0">
                                                    <input class="form-control" id="password" name="password"
                                                        type="password" placeholder="" />
                                                    <label for="password">Contraseña</label>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-floating mb-3 mb-md-0">
                                                    <input class="form-control" id="password2" name="password2"
                                                        type="password" placeholder="" />
                                                    <label for="password2">Confirmar contraseña</label>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="mt-4 mb-0">
                                            <div class="d-grid">
                                                <button class="btn btn-primary" type="submit" id="submit"
                                                    name="submit">Registrar</button>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                                <div class="card-footer text-center py-3">
                                    <div class="small"><a href="admin.php">Regresar</a></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </main>
        </div>
        <div id="layoutAuthentication_footer">
            <footer class="py-4 bg-light mt-auto">
                <div class="container-fluid px-4">

                </div>
            </footer>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="../js/scripts.js"></script>
    <script type="text/javascript">
    $(document).ready(function() {
        $('#submit').click(function(e) {
            e.preventDefault();
            var data = $('#frm_usuario').serialize();  
            $.ajax({
                type: "POST",
                url: "../../controllers/RegistrarAdmin.php",
                data: data,
                success: function(data) {
                    if (data == 1) {
                        Swal.fire({
                            icon: 'success',
                            title: 'Registrado',
                            text: 'Registro completado',                            
                        })
                    } else {
                        Swal.fire({
                            icon: 'error',
                            title: 'Error',
                            text: 'Lo siento algo salio mal',                            
                        })
                    }
                }
            })
            return false;
        })
    })
    </script>
   
    <!-- <script>
        // Este script funciona para activar y desactivar un boton en un horario establecido
   var ini = new Date();
ini.setHours(11,08,0);
var fin = new Date();
fin.setHours(19,0,0);
var hoy = new Date();

console.log( '¿Dentro de horario?'
           , ini.getTime() <= hoy.getTime() && hoy.getTime() <= fin.getTime() 
           ,hoy);
window.setInterval(
    function(){
                var ini = new Date();
        ini.setHours(8,19,0);
        var fin = new Date();
        fin.setHours(16,23,0);
        var hoy = new Date();
            
      if(ini.getTime() <= hoy.getTime() && hoy.getTime() <= fin.getTime()){
        document.getElementById('submit').style.display = 'block';
      }else{
        document.getElementById('submit').style.display = 'none';
      }
  }
,1000);
    </script> -->
</body>

</html>