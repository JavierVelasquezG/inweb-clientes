<?php

session_start();

if (!$_SESSION['logged']) {

    //Usuario no logueado

    if (file_exists('login.php')) {

        die(header('Location: login.php'));

    } else {

        die(header('Location: ../login.php'));
        
    }

}

echo "<script>console.log('Usuario logueado')</script>";

?>