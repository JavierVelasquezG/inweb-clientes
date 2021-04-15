<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="views/css/master.css">
    <?php
    
    switch($page) {
        case 'paginaPrincipal':
            echo "<link rel='stylesheet' href='views/css/paginaPrincipal.css'>";
        break;
    }
    
    ?>
    <title>Clientes - Inweb</title>
</head>
<body>
    <div id="bodyContainer">