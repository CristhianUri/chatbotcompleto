
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title>Login - SB Admin</title>
    <link href="../css/styles.css" rel="stylesheet" />
    <script src="https://use.fontawesome.com/releases/v6.3.0/js/all.js" crossorigin="anonymous"></script>
</head>

<body class="bg-primary">
    <div id="layoutAuthentication">
        <div id="layoutAuthentication_content">
            <main>
                <div class="container">
                    <div class="row justify-content-center">
                        <div class="col-lg-5">
                            <div class="card shadow-lg border-0 rounded-lg mt-5">
                                <div class="card-header">
                                    <h3 class="text-center font-weight-light my-4">Iniciar sesión</h3>
                                    <?php
            if (isset($_REQUEST["vacio"]) && $_REQUEST["vacio"] == 'false') {
                echo "<div><h6 style='color:red'>Porfavor rellena los campos solicitados</h6> </div>";
            }
            ?>
                                    <?php
            if (isset($_REQUEST["error"]) && $_REQUEST["error"] == 'false') {
                echo "<div><h6 style='color:red'> Email o contraseña incorrectos</h6> </div>";
            }
            ?>
                                    <?php
            if (isset($_REQUEST["denegado"]) && $_REQUEST["denegado"] == 'false') {
                echo "<div><h6 style='color:red'>Acceso denegado, inicia sesión</h6> </div>";
            }
            ?>
                                </div>
                                <div class="card-body">
                                    <form method="POST" action="../../controllers/login.php">
                                        <div class="form-floating mb-3">
                                            <input class="form-control" id="email" name="email" type="email"
                                                placeholder="name@example.com" />
                                            <label for="inputEmail">Email </label>
                                        </div>
                                        <div class="form-floating mb-3">
                                            <input class="form-control" id="password" name="password" type="password"
                                                placeholder="Password" />
                                            <label for="inputPassword">Contraseña</label>
                                        </div>

                                        <div class="d-flex align-items-center justify-content-between mt-4 mb-0">
                                            <button class="btn btn-primary" type="submit" id="submit"
                                                name="submit">Iniciar sesion</button>
                                        </div>
                                    </form>
                                </div>
                                <div class="card-footer text-center py-3">
                                    <div class="small"><a href="register.php">Registrar administrador</a></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </main>
        </div>

    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous">
    </script>
    <script src="../js/scripts.js"></script>
</body>

</html>