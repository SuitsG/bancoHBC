<?php
session_start();
require_once($_SERVER['DOCUMENT_ROOT'] . '/information/accessInformation.php');

// Inicializar la variable
$nombreCompleto = ''; // Valor predeterminado

// Recuperar el número de cuenta de la URL
if (isset($_SESSION['numeroCuenta'])) {
    $numeroCuenta = $_SESSION['numeroCuenta'];

    require_once($_SERVER['DOCUMENT_ROOT'] . '/information/funtions.php');

    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $monto = (float) $_POST['monto'];
        $operacion = $_POST['operacion'];

        // Validar la operación seleccionada
        if ($operacion === 'agregar') {
            $resultado = agregarSaldo($numeroCuenta, $monto);
        } elseif ($operacion === 'retirar') {
            $resultado = retirarSaldo($numeroCuenta, $monto);
        } else {
            $resultado = "Operación no válida.";
        }
    } else {
        echo "";
    }

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
    <link rel="stylesheet" href="/css/accountExists.css">
</head>

<body>
    <header class="header">
        <div class="header__div">
        <a class="header__button" href="../index.html">Volver a inicio</a>
    </div>
        <h1 class="header__h1" >Bienvenido a HBC <?= $nombreCompleto ?></h1>
    </header>
    <main class="main">
        <section class="main__section">
        <p class="main__p">Numero de cuenta: <?= $numeroCuenta ?></p>
        <p class="main__p">tipo de cuenta: <?= $tipoCuenta ?></p>
        <p class="main__p">Saldo actual: <?= $saldo ?> pesos</p>
        <p class="main__p__mensaje"><?= $mensaje?></p>
        <section class="main__div">
            <form class="main__div__form" action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST">
                <div class="monto__div">
                <label class="main__div__form__label" for="monto">Monto a Operar:</label><br>
                <input class="main__div__form__input__monto" type="number" id="monto" name="monto" required><br><br>
                </div>
                
                <label class="main__div__form__label" for="operacion">Seleccione la operación:</label><br>
                <input class="main__div__form__input" type="radio" id="agregar" name="operacion" value="agregar" required>
                <label class="main__div__form__label" for="agregar">Agregar Saldo</label><br>
                <input class="main__div__form__input" type="radio" id="retirar" name="operacion" value="retirar" required>
                <label class="main__div__form__label" for="retirar">Retirar Saldo</label><br><br>

                
                <button class="main__div__form__button" type="submit">Enviar</button>
            </form>
        </section>
        </section>
    </main>
</body>

</html>
