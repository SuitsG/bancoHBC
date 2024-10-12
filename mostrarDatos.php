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
    <title>cuentaCreada</title>
    <link rel="stylesheet" href="/css/mostrarDatos.css">
</head>

<body>
    <header class="header">
        <div class="header__div">
            <a class="header__div__a" href="./index.html">Volver a la pagina pricipal</a>
        </div>
        <h1 class="header__titulo">Bienvenido a HBC</h1>
        <p class="header__p">Su cuenta fue registrada exitisamente</p>
    </header>
    <main class="main">
        <section class="main__section">
        <div class="main__section__div">
            <p>!Importante recordar, numero de cuenta</p>
            <p>Datos:</p>
            <p>Numero de cuenta: <?= $numeroCuenta ?></p>
            <p>Nombre: <?= $nombre ?></p>
            <p>Tipo de cuenta: <?= $tipoCuenta ?></p>
            <p>Numero de identificación: <?= $numeroDocumento ?></p>
            <p>Saldo: <?= $saldo ?></p>
        </div>
        </section>
    </main>
</body>

</html>