<?php
session_start();
require_once('./information/accessInformation.php');

// Inicializar la variable
$nombreCompleto = ''; // Valor predeterminado

// Recuperar el número de cuenta de la URL
if (isset($_SESSION['numeroCuenta'])) {
    $numeroCuenta = $_SESSION['numeroCuenta'];

    require_once('./information/funtions.php');

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
        echo "Error: No se ha enviado ningún dato.";
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
</head>

<body>
    <header>
        <a href="../index.html">Volver a inicio</a>
    </header>
    <main>
        <h1>Bienvenido a HBC <?= $nombreCompleto ?></h1>
        <p>Su numero de cuenta es <?= $numeroCuenta ?></p>
        <p>Su tipo de cuenta es <?= $tipoCuenta ?></p>
        <p>Actualmente tiene un saldo de <?= $saldo ?> pesos</p>
        <p><?= $mensaje?></p>
        <section>
            <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST">
                <label for="monto">Monto a Operar:</label><br>
                <input type="number" id="monto" name="monto" required><br><br>

                <label for="operacion">Seleccione la operación:</label><br>
                <input type="radio" id="agregar" name="operacion" value="agregar" required>
                <label for="agregar">Agregar Saldo</label><br>
                <input type="radio" id="retirar" name="operacion" value="retirar" required>
                <label for="retirar">Retirar Saldo</label><br><br>

                <button type="submit">Enviar</button>
            </form>
        </section>
    </main>
</body>

</html>
