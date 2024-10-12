<?php 
require_once($_SERVER['DOCUMENT_ROOT'] . '/information/accessInformation.php');


$mensaje = "";
// Función para agregar saldo
function agregarSaldo($numeroCuenta, $monto) {
    global $clientes, $archivoClientes, $mensaje;

    // Verificar si el número de cuenta existe
    if (array_key_exists($numeroCuenta, $clientes)) {
        // Sumar el monto al saldo actual
        $clientes[$numeroCuenta]['saldo'] += $monto;

        // Guardar los cambios en el archivo JSON
        file_put_contents($archivoClientes, json_encode($clientes));

        $mensaje = "Saldo agregado exitosamente.";
    } else {
        $mensaje = "Error: La cuenta con número $numeroCuenta no existe.<br>";
    }
}

// Función para retirar saldo
function retirarSaldo($numeroCuenta, $monto) {
    global $clientes, $archivoClientes, $mensaje;

    // Verificar si el número de cuenta existe
    if (array_key_exists($numeroCuenta, $clientes)) {
        // Verificar si hay suficiente saldo
        if ($clientes[$numeroCuenta]['saldo'] >= $monto) {
            // Restar el monto del saldo actual
            $clientes[$numeroCuenta]['saldo'] -= $monto;

            // Guardar los cambios en el archivo JSON
            file_put_contents($archivoClientes, json_encode($clientes));

            $mensaje = "Saldo retirado exitosamente.";
        } else {
            $mensaje= "Error: No hay suficiente saldo para retirar.";
        }
    } else {
        echo "Error: La cuenta con número $numeroCuenta no existe.<br>";
    }
}

?>