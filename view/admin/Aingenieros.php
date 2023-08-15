<?php
    include "../../Db/conexion.php"
?>
<?php
# Si no entiendes el código, primero mira a login.php
# Iniciar sesión para usar $_SESSION
session_start();
# Y ahora leer si NO hay algo llamado usuario en la sesión,
# usando empty (vacío, ¿está vacío?)
# Recomiendo: https://parzibyte.me/blog/2018/08/09/isset-vs-empty-en-php/
if (empty($_SESSION["email"])) {
    # Lo redireccionamos al formulario de inicio de sesión
    header("Location: index.php");
    # Y salimos del script
    exit();
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title>Dashboard - SB Admin</title>
    <link href="https://cdn.jsdelivr.net/npm/simple-datatables@7.1.2/dist/style.min.css" rel="stylesheet" />
    <link href="../css/styles.css" rel="stylesheet" />
    <script src="https://use.fontawesome.com/releases/v6.3.0/js/all.js" crossorigin="anonymous"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.3/jquery.min.js"></script>
</head>
<style>
#canvas {
    border: 1px solid;
}

.texarea {
    background-color: #83E2E4;
}
</style>

<body class="sb-nav-fixed">
    <nav class="sb-topnav navbar navbar-expand navbar-dark bg-primary">
        <!-- Navbar Brand-->
        <a class="navbar-brand ps-3" href="admin.php">Chatbot</a>
        <!-- Sidebar Toggle-->
        <button class="btn btn-link btn-sm order-1 order-lg-0 me-4 me-lg-0" id="sidebarToggle" href="#!"><i
                class="fas fa-bars"></i></button>
        <!-- Navbar Search-->
        <form class="d-none d-md-inline-block form-inline ms-auto me-0 me-md-3 my-2 my-md-0">

        </form>
        <!-- Navbar-->
        <ul class="navbar-nav ms-auto ms-md-0 me-3 me-lg-4">
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" id="navbarDropdown" href="#" role="button" data-bs-toggle="dropdown"
                    aria-expanded="false"><i class="fas fa-user fa-fw"></i></a>
                <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                    <li><a class="dropdown-item" href="register.php">Crear nuevo administrador</a></li>

                    <li>
                        <hr class="dropdown-divider" />
                    </li>
                    <li><a class="dropdown-item" href="../../controllers/logout.php">Logout</a></li>
                </ul>
            </li>
        </ul>
    </nav>
    <div id="layoutSidenav">
        <div id="layoutSidenav_nav">
            <nav class="sb-sidenav accordion sb-sidenav-dark" id="sidenavAccordion">
                <div class="sb-sidenav-menu">
                    <div class="nav">
                        <div class="sb-sidenav-menu-heading">Core</div>
                        <a class="nav-link" href="admin.php">
                            <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
                            Inicio
                        </a>
                        <div class="sb-sidenav-menu-heading">Interface</div>
                        <a class="nav-link collapsed" href="#" data-bs-toggle="collapse"
                            data-bs-target="#collapseLayouts" aria-expanded="false" aria-controls="collapseLayouts">
                            <div class="sb-nav-link-icon"><i class="fas fa-columns"></i></div>
                            Modificar contenido
                            <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                        </a>
                        <div class="collapse" id="collapseLayouts" aria-labelledby="headingOne"
                            data-bs-parent="#sidenavAccordion">
                            <nav class="sb-sidenav-menu-nested nav">
                                <a class="nav-link" href="dash.php">Preguntas no registradas</a>
                                <a class="nav-link" href="contenidochat.php">Editar contenido del chat</a>
                            </nav>
                        </div>
                        <a class="nav-link collapsed" href="#" data-bs-toggle="collapse"
                            data-bs-target="#collapseLayouts2" aria-expanded="false" aria-controls="collapseLayouts">
                            <div class="sb-nav-link-icon"><i class="fas fa-columns"></i></div>
                            Servicios
                            <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                        </a>
                        <div class="collapse" id="collapseLayouts2" aria-labelledby="headingOne"
                            data-bs-parent="#sidenavAccordion">
                            <nav class="sb-sidenav-menu-nested nav">
                                <a class="nav-link" href="ingenieros.php">Registrar ingeniero</a>
                                <a class="nav-link" href="servicios.php">Tabla de servicios terminados</a>
                            </nav>
                        </div>

                    </div>
                </div>
            </nav>
        </div>
        <div id="layoutSidenav_content">
            <main>
                <div class="container-fluid px-4 mt-4">


                    <div class="card mb-4">
                        <div class="card-header">

                            <h5><i class="fas fa-table me-1"></i> </h5>
                        </div>
                        <div class="card-body">
                            <?php 
            $id = $_REQUEST['id'];

            $update = $bd->query("SELECT * FROM ingenieros WHERE ID_ingeniero = $id;");
            $res = $update->fetchAll(PDO::FETCH_ASSOC);
            ?>
                            <?php 
                foreach ($res as $resultado) {
                    # code...
                
            ?>

                            <div class="container">
                                <div class="d-flex justify-content-center ">

                                    <div class="col-lg-6 col-md-3">
                                        <form method="post" id="frm_registrar2" enctype="multipart/form-data">
                                            <div class="row">
                                                <div class="mb-3">
                                                    <input type="text" class="form-control border-dark texarea "
                                                        value="<?php echo $resultado['ID_ingeniero'] ?>" id="id"
                                                        name="id"
                                                        placeholder="<?php echo $resultado['ID_ingeniero'] ?> " hidden>
                                                </div>
                                                <label for="nombre" class="form-label text-center">
                                                    Nombre
                                                </label>
                                                <div class="mb-3">
                                                    <input type="text" class="form-control texarea border-dark"
                                                        placeholder="<?php echo $resultado['Nombre']?>"
                                                        value="<?php echo $resultado['Nombre']?>" name="nombre" id="nombre">
                                                </div>
                                              

                                                <div class="col-6 mt-2">
                                                    <input type='' hidden name='imagen' id='imagen' />
                                                </div>
                                                <div class="mb-3">
                                                    <button type="submit" class="btn btn-success" name="submit2"
                                                        id="submit2" onclick='GuardarTrazado()'>Guardar</button>

                                                </div>
                                            </div>
                                        </form>
                                        <canvas class="mt-3" id='canvas' width="350" height="100"
                                            style='border: 1px solid #black;'>
                                            <p>Tu navegador no soporta canvas</p>
                                        </canvas>
                                        <div class="col-12" id="limpiar">
                                            <button type="button" class="btn btn-primary"
                                                onclick="limpiar()">limpiar</button>
                                        </div>

                                    </div>
                                    <?php }?>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
            </main>
            <footer class="py-4 bg-light mt-auto">
                <div class="container-fluid px-4">
                    <div class="d-flex align-items-center justify-content-between small">

                    </div>
                </div>
            </footer>
        </div>
    </div>

    <script src="../../ajax/canvas.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous">
    </script>
    <script src="../js/scripts.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>


    <script type="text/javascript">
    function limpiar() {
        var canvas = document.getElementById("canvas");
        var ctx = canvas.getContext("2d");
        // Borramos el área que nos interese
        ctx.clearRect(0, 0, canvas.width, canvas.height);
    }
    </script>
    <script type="text/javascript">
    $(document).ready(function() {
        $('#submit2').click(function(e) {
            e.preventDefault();
            var data = $('#frm_registrar2').serialize();
            alert(data);
            $.ajax({
                type: "POST",
                url: "../../infochat/ingenieros/Aings.php",
                data: data,

                success: function(data) {
                    if (data == 1) {

                        window.location.replace("ingenieros.php");
                    } else {
                        Swal.fire({
                            icon: 'error',
                            title: 'Error',
                            text: 'Porfavor llena los campos solicitados',
                        })
                    }
                }
            })
            return false;
        })
    })
    </script>
    <!--   <script>
        $(document).ready(function() {
        $('#submit2').click(function(e) {
            e.preventDefault();
            var data = $('#frm_registrar2').serialize();
            alert(data);
            $.ajax({
                type: "POST",
                url: "../../infochat/ingenieros/Aingenieros.php",
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
                            text: 'Las contraseñas no coninciden o el correo se encuentra registrado',                            
                        })
                    }
                }
            })
            return false;
        })
    })
    
    </script> -->
</body>

</html>