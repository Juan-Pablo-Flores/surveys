<?php
    include("config.php");
    session_start();
    $errors = array(); 

    if($_SERVER["REQUEST_METHOD"] == "POST") {
        if (isset($_POST['login'])) {
            $myusername = mysqli_real_escape_string($db,$_POST['login_user']);
            $mypassword = mysqli_real_escape_string($db,$_POST['login_password']);

            $sql = "SELECT id FROM usuarios WHERE nombre = '$myusername' and contrasena = '$mypassword'";
            $result = mysqli_query($db,$sql);
            $row = mysqli_fetch_array($result,MYSQLI_ASSOC);

            $count = mysqli_num_rows($result);

            if($count == 1) {
                $_SESSION['login_user'] = $myusername;
                header("location: index.php");
            } else {
                array_push($errors, "El usuario o contraseña no son correctos");
                header("location: login.php");
            }
        }
    }
?>