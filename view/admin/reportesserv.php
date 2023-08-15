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
<?php 
    include "../../Db/conexion.php"
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
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.3/jquery.min.js"></script>
</head>

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
                        <div class="sb-sidenav-menu-heading"></div>
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
                <div class="container-fluid px-4">

                    <div class="mt-2">

                    </div>
                    <?php 
        $select = $bd -> query("SELECT* FROM ingenieros ");
        $row = $select -> fetchAll(PDO:: FETCH_ASSOC); 
    ?>
                    <div class="card mt-2 border-dark">
                        <div class="card-header  border-dark">
                            <i class="fas fa-table me-1"></i>
                            <strong>Seleccione el perido que quiere revisar</strong>
                            <p><strong>Nota:</strong> Seleccionar un ingeniero es opcional para realizar la busqueda</p>
                        </div>
                        <div class="card-body  border-dark">
                            <form method="POST" id="frm_fil" name="frm_fil">

                                <div class="input-group">
                                    <div class="col-xs-6 col-sm-6 col-md-6">
                                        <label for="f1">Fecha minima:</label>
                                        <div class="col-xs-3 col-sm-3 col-md-3">

                                        </div>
                                        <div class="col-xs-9 col-sm-9 col-md-9 ">
                                            <input type="date" name="f1" id="f1" class=" border-dark form-control">
                                        </div>
                                    </div>
                                    <div class="col-xs-6 col-sm-6 col-md-6">
                                        <div class="col-xs-3 col-sm-3 col-md-3 ">
                                            <label for="f2">Fecha maxima:</label>
                                        </div>
                                        <div class="col-xs-9 col-sm-9 col-md-9 ">
                                            <input type="date" name="f2" id="f2" class=" border-dark form-control">
                                        </div>
                                    </div>
                                    <div class="col-xs-6 col-sm-6 col-md-6 mt-3">
                                        <label for="f2">Selecciona a un ingeniero:</label>
                              
                                        <div class="col-xs-9 col-sm-9 col-md-9 ">
                                            <select class="form-select border-dark" name="ingenieros" id="ingenieros">
                                                <option value="" dissabled>Selecciona ingeniero </option>
                                                <?php 
                                                if ($select->rowCount()>0) {
                                                    # code...
                                                      foreach ($row as $rows) {   
                                        ?>
                                                <option value="<?php echo $rows['ID_ingeniero'] ?>">
                                                    <?php echo $rows['Nombre']?>
                                                </option>';
                                                <?php          }
                                                }
                                        ?>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <button type="submit" name="btn-fil" id="btn-fil"
                                    class="btn btn-primary mt-3">Buscar</button>
                            </form>
                        </div>
                    </div>

                    <div class="card mt-2  border-dark">
                        <div class="card-header  border-dark">
                            <i class="fas fa-table me-1"></i>
                            Lista de servicios en el perido seleccionado
                        </div>
                        <div class="card-body  border-dark">
                            <section id="mitabla"></section>
                        </div>
                    </div>
                </div>
            </main>
            <footer class="py-4 bg-light mt-auto">
                <div class="container-fluid px-4">
                    <div class="d-flex align-items-center justify-content-between small">

                        <div>

                        </div>
                    </div>
                </div>
            </footer>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous">
    </script>
    <script src="../js/scripts.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.min.js" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>


    <script type="text/javascript">
    $(document).ready(function() {
        $('#btn-fil').click(function(e) {
            e.preventDefault();
            var data = $('#frm_fil').serialize();
            $.ajax({
                type: "POST",
                url: "../../infochat/ingenieros/reporteserv.php",
                data: data,
                success: function(data) {
                    $('#mitabla').html('');
                    $('#mitabla').append(data);

                }
            })
            return false;
        })
    })
    </script>

</body>

</html>