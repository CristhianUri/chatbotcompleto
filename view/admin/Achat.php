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
</head>
<style>
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

            $update = $bd->query("SELECT * FROM chatbot WHERE ID_chat = $id;");
            $res = $update->fetchAll(PDO::FETCH_ASSOC);
            ?>
                            <?php 
                foreach ($res as $resultado) {
                    # code...
                
            ?>

                            <div class="container">
                                <div class="d-flex justify-content-center ">

                                    <div class="col-lg-6 col-md-3">

                                        <form id="frm_nuevares" method="POST"
                                            action="../../infochat/contenidochat/Actualizarpre.php">
                                            <div class="mb-3 text-center" hidden>
                                                <label for="id" class="form-label">
                                                    <p class="text-break">Id pregunta <br>
                                                        <strong>Nota:</strong>
                                                        No cambie el valor que se muestra
                                                    </p>
                                                </label>
                                                <input type="text" class="form-control border-dark texarea "
                                                    value="<?php echo $resultado['ID_chat'] ?>" id="id" name="id"
                                                    placeholder="<?php echo $resultado['ID_chat'] ?>">
                                            </div>
                                            <div class="mb-3 text-center">
                                                <label for="queries2" class="form-label">
                                                    <p class="text-break">Pregunta resgristrada <br>
                                                        <strong>Nota:</strong>
                                                        Puedes editar la pregunta registrada en el chat
                                                    </p>
                                                </label>
                                                <input type="text" class="form-control border-dark texarea "
                                                    id="queries" name="queries"
                                                    value="<?php echo $resultado['preguntas'] ?>"
                                                    placeholder="<?php echo $resultado['preguntas'] ?>">
                                            </div>
                                            <div class="mb-3 text-center">
                                                <label for="response2" class="form-label">Estas son las respuestas
                                                    registradas en el chat <br>
                                                    <strong>Nota:</strong>
                                                    Si cambias lo que se encuentra escrito aqui la respuesta del chat
                                                    cambiara
                                                </label>
                                                <textarea class="form-control border-dark texarea" id="responses"
                                                    name="responses" rows="3"
                                                    placeholder="<?php echo $resultado['respuestas'] ?>"><?php echo $resultado['respuestas'] ?></textarea>
                                            </div>
                                            <div class="mb-3">
                                                <button type="submit" class="btn btn-success">Actualizar</button>
                                            </div>

                                        </form>
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
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous">
    </script>
    <script src="../js/scripts.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.min.js" crossorigin="anonymous"></script>
    <script src="../assets/demo/chart-area-demo.js"></script>
    <script src="../assets/demo/chart-bar-demo.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/simple-datatables@7.1.2/dist/umd/simple-datatables.min.js"
        crossorigin="anonymous"></script>
    <script src="../js/datatables-simple-demo.js"></script>
    <script>
    function tiemporeal() {
        var tabla = $.ajax({
            url: '../../infochat/contenidochat/noresponse.php',
            dataType: 'text',

            async: false,
        }).responseText;
        document.getElementById('mitabla').innerHTML = tabla;
    }
    setInterval(tiemporeal, 1000);
    </script>

</body>

</html>