<?php
    include("config.php");
    include('session.php');
    $_SESSION['error_count'] = 0;


    if($_SERVER["REQUEST_METHOD"] == "POST") {

        if (isset($_POST['anon'])) {
            $user_id = "";
        } else {
            $username = $_SESSION['username'];
            $user_id_query = "SELECT `id` FROM `usuarios` WHERE usuario = '$username'";
            $result = mysqli_query($db, $user_id_query);
            $row = mysqli_fetch_assoc($result);
            $user_id = $row['id'];
        }
        foreach($_POST as $key => $value)
        {
            if ($key !== "anon"){

                if (!empty($user_id)) {
                    $sql = "INSERT INTO `respuestas` (`id_opcion`, `id_usuario`, `id_pregunta`, `instante`) VALUES ('$key', '$user_id', '$value', NULL)";
                } else {
                    $sql = "INSERT INTO `respuestas` (`id_opcion`, `id_usuario`, `id_pregunta`, `instante`) VALUES ('$key', NULL, '$value', NULL)";
                }
                
                if (!mysqli_query($db, $sql)) {
                    $_SESSION['error_count']++;
                }
            }
        }
        header('location: index.php');
    }