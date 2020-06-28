<?php
    include("config.php");
    session_start();
    $errors = array(); 

    if ('POST' === $_SERVER['REQUEST_METHOD']) {
        // REGISTER USER
        if (isset($_POST['register'])) {
            // receive all input values from the form
            $reg_user = mysqli_real_escape_string($db, $_POST['reg_user']);
            $reg_password = mysqli_real_escape_string($db, $_POST['reg_password']);

            // first check the database to make sure if the user exists
            $user_check_query = "SELECT * FROM usuarios WHERE nombre='$reg_user' LIMIT 1";
            $result = mysqli_query($db, $user_check_query);
            $user = mysqli_fetch_assoc($result);
            
            if ($user) { // if user exists
                if ($user['nombre'] === $reg_user) {
                    array_push($errors, "El usuario ya existe");
                }
            }
        
            // Finally, register user if there are no errors in the form
            if (count($errors) == 0) {
                $reg_password = md5($reg_password);//encrypt the password before saving in the database
        
                $query = "INSERT INTO users (usuario, contrasena) 
                        VALUES('$reg_user', '$reg_password')";
                mysqli_query($db, $query);
                $_SESSION['reg_user'] = $reg_user;
                $_SESSION['success'] = "You are now logged in";
                header('location: index.php');
            }
        }

        // LOGIN USER
        if (isset($_POST['login'])) {
            $login_user = mysqli_real_escape_string($db, $_POST['login_user']);
            $login_password = mysqli_real_escape_string($db, $_POST['login_password']);
        
            if (count($errors) == 0) {
                $password = md5($password);
                $query = "SELECT * FROM users WHERE usuario='$login_user' AND contrasena='$login_password'";
                $results = mysqli_query($db, $query);
                if (mysqli_num_rows($results) == 1) {
                $_SESSION['username'] = $login_user;
                $_SESSION['success'] = "You are now logged in";
                header('location: index.php');
                } else {
                    array_push($errors, "Wrong username/password combination");
                }
            } else {
                array_push($errors, "Something went wrong");
                header('location: login.php');
            }
        }
    } else {
        array_push($errors, "Something went wrong");
        header('location: login.php');
    }
?>