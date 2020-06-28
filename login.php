<?php include('server.php') ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css"
        integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">

    <!-- Custom CSS -->
    <style>
        .custom-border-left {
            border-left: 1px solid lightgray;
        }
    </style>

    <title>Encuestas</title>
</head>

<body>
    <main>
        <header class="row">
            <div class="col text-center mb-4 p-0">
                <img src="img/fie.png" alt="Faculty Logo" class="img-fluid my-5">
                <h1 class="mb-3 m-auto">Encuestas</h1>
            </div>
        </header>
        <div class="row mb-5">
            <div class="col p-0">
                <h3 class="mb-5 text-center">Ingresa con tu cuenta</h3>
                <div class="container w-50 border rounded py-3">
                    <div class="d-flex flex-column">
                        <form action="server.php" method="post">
                            <div class="form-group">
                                <label for="login-user">Usuario</label>
                                <input type="text" class="form-control" id="login-user"
                                    placeholder="Ingresa tu nombre de usuario" name="login_user" required>
                            </div>
                            <div class="form-group">
                                <label for="login-password">Contraseña</label>
                                <input type="password" class="form-control" id="login-password"
                                    placeholder="Ingresa tu contraseña" name="login_password" required>
                            </div>
                            <div class="text-center">
                                <button type="submit" class="btn btn-primary w-100 mb-3" name="login">Ingresar</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <div class="col p-0">
                <div class="custom-border-left">
                    <h3 class="mb-3 text-center">Registrate*</h3>
                    <small class="text-danger d-block text-center">*Debes registrarte para llenar encuestas</small>
                    <div class="container w-50 border rounded py-3">
                        <div class="d-flex flex-column">
                            <form action="server.php" method="post">
                                <div class="form-group">
                                    <label for="reg-user">Usuario</label>
                                    <input type="text" class="form-control" id="reg-user" placeholder="Usuario"
                                        name="reg_user" required>
                                </div>
                                <div class="form-group">
                                    <label for="reg-password">Contraseña</label>
                                    <input type="password" class="form-control" id="reg-password"
                                        placeholder="Contraseña" name="reg_password" required>
                                </div>
                                <div class="text-center">
                                    <button type="submit" class="btn btn-primary w-100 mb-3" name="register">Registrarme</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <?php include('errors.php'); ?>
        </div>
    </main>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"
        integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj"
        crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"
        integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo"
        crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"
        integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI"
        crossorigin="anonymous"></script>
</body>

</html>