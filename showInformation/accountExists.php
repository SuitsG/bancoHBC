<?php
session_start();
require_once('./information/accessInformation.php');

// Inicializar la variable
$nombreCompleto = ''; // Valor predeterminado

// Recuperar el número de cuenta de la URL
if (isset($_SESSION['numeroCuenta'])) {
    $numeroCuenta = $_SESSION['numeroCuenta'];

    if (array_key_exists($numeroCuenta, $clientes)) {
        // Acceder a los datos del cliente
        $nombreCompleto = $clientes[$numeroCuenta]['nombreCompleto'];
        $tipoDocumento = $clientes[$numeroCuenta]['tipoDocumento'];
        $numeroDocumento = $clientes[$numeroCuenta]['numeroDocumento'];
        $tipoCuenta = $clientes[$numeroCuenta]['tipoCuenta'];
        $saldo = $clientes[$numeroCuenta]['saldo'];
    } else {
        echo 'Número de cuenta no encontrado.';
    }
} else {
    echo "Número de cuenta no disponible.";
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <main>
        <h1>Bienvenida jajajajsj ldjs <?=$nombreCompleto?></h1>
    </main>
</body>
</html>