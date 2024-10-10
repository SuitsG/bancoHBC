<?php
require_once('./information/accessInformation.php');
ultimoCliente();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1>Bienvenido a HBC <?=$nombre ?></h1>
    <p>Su numero de cuenta es <?= $numeroCuenta ?></p>
    <p>Su tipo de cuenta es <?= $tipoCuenta ?></p>
</body>
</html>