<?php

require __DIR__ . '/../models/model.php';

//Input: Usuario, contraseña

$input = array(
    'correo' => 'testemail',
    'contrasena' => 'testpassword'
);

$login = new Login;

try {
    
    $result = $login->prepareLogin($input['correo']);

} catch (Exception $e) {

    echo 'Error: ' . $e->getMessage(); 
    echo '<br>';
    echo 'Codigo: ' . $e->getCode();

    die();

}

if (!$result) {

    //Error: Usuario inexistente
    die('Usuario no encontrado');

}

if (password_verify($input['contrasena'], $result['contrasena'])) {

    //Success
    session_start();

    $_SESSION['user_id'] = $result['id'];
    $_SESSION['logged'] = true;

    die(header('Location: ../index.php'));

} else {

    //Error: Contraseña incorrecta
    die('Contraseña incorrecta');

}



?>