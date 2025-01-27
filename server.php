<?php
    include("config.php");
    session_start();
    $errors = array(); 

    if($_SERVER["REQUEST_METHOD"] == "POST") {
        if (isset($_POST['login'])) {
            $myusername = mysqli_real_escape_string($db,$_POST['login_user']);
            $mypassword = mysqli_real_escape_string($db,$_POST['login_password']);

            $sql = "SELECT * FROM usuarios WHERE usuario = '$myusername' AND contrasena = '$mypassword'";
            $result = mysqli_query($db,$sql);
            $row = mysqli_fetch_assoc($result);

            $count = mysqli_num_rows($result);

            if($count == 1) {
                $_SESSION['username'] = $myusername;
                header("location: index.php");
            } else {
                array_push($errors, "El usuario o contraseña no son correctos");
            }
        }

        // REGISTER USER
        if (isset($_POST['register'])) {
            // receive all input values from the form
            $reg_user = mysqli_real_escape_string($db, $_POST['reg_user']);
            $reg_password = mysqli_real_escape_string($db, $_POST['reg_password']);

            // first check the database to make sure if the user exists
            $user_check_query = "SELECT * FROM usuarios WHERE usuario='$reg_user' LIMIT 1";
            $result = mysqli_query($db, $user_check_query);
            $user = mysqli_fetch_assoc($result);
            
            if ($user) { // if user exists
                if ($user['usuario'] === $reg_user) {
                    array_push($errors, "El usuario ya existe");
                }
            }
        
            // Finally, register user if there are no errors in the form
            if (count($errors) == 0) {
                $query = "INSERT INTO `usuarios` (`id`, `usuario`, `contrasena`) VALUES (NULL, '$reg_user', '$reg_password')";
                $res = mysqli_query($db, $query);
                if (!$res) {
                    array_push($errors, "Internal Server Error");
                } else {
                    $_SESSION['username'] = $reg_user;
                    $_SESSION['success'] = "You are now logged in";
                    header('location: index.php');
                }
            }
        }

    }
?>