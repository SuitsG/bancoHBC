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

        $mensaje = "Saldo agregado <br> exitosamente.";
    } else {
        $mensaje = "Error: La cuenta con número $numeroCuenta no existe.<br>";
    }
}
/* FUNCION DE RETIRAR SALDO */
function retirarSaldo($numeroCuenta, $monto) {
    global $clientes, $archivoClientes, $mensaje;

    // Verificar si el número de cuenta existe
    if (array_key_exists($numeroCuenta, $clientes)) {
        $tipoCuenta = $clientes[$numeroCuenta]['tipoCuenta']; // Obtener el tipo de cuenta (ahorros o corriente)
        $saldoActual = $clientes[$numeroCuenta]['saldo'];

        // Lógica para cuenta corriente con sobregiro permitido hasta 300,000
        if ($tipoCuenta === "corriente") {
            $limiteSobregiro = 300000; // Límite de sobregiro permitido
            $saldoPermitido = $saldoActual + $limiteSobregiro; // Saldo disponible con sobregiro

            // Aplicar impuesto del 4x1000
            $impuesto = $monto * 0.004; // 0.4% del monto retirado
            $totalRetiro = $monto + $impuesto; // Total a deducir incluyendo el impuesto

            if ($saldoPermitido >= $totalRetiro) {
                // Verificar si se está utilizando el sobregiro
                if ($saldoActual < $monto) {
                    // Sobregiro utilizado
                    $mensaje = "Usted está sobregirando la <br> cuenta. Saldo retirado<br> exitosamente, se cobró un  <br> impuesto de $impuesto pesos <br> por el 4x1000.";
                } else {
                    // Sin sobregiro
                    $mensaje = "Saldo retirado exitosamente,<br> se cobró un impuesto de <br> $impuesto pesos por el 4x1000.";
                }

                // Restar el monto y el impuesto del saldo actual
                $clientes[$numeroCuenta]['saldo'] -= $totalRetiro;

                // Guardar los cambios en el archivo JSON
                file_put_contents($archivoClientes, json_encode($clientes));

            } else {
                $mensaje = "Error: No hay suficiente <br> saldo para retirar (incluyendo <br> sobregiro e impuesto del 4x1000).";
            }
        } 
        // Lógica para cuentas de ahorro (sin sobregiro)
        elseif ($tipoCuenta === "ahorro") {
            if ($saldoActual >= $monto) {
                // Restar el monto del saldo actual
                $clientes[$numeroCuenta]['saldo'] -= $monto;

                // Guardar los cambios en el archivo JSON
                file_put_contents($archivoClientes, json_encode($clientes));

                $mensaje = "Saldo retirado <br>     exitosamente.";
            } else {
                $mensaje = "Error: No hay suficiente <br> saldo para retirar.";
            }
        } else {
            $mensaje = "Error: Tipo de cuenta no válido.";
        }
    } else {
        echo "Error: La cuenta con número $numeroCuenta no existe.<br>";
    }
}

?>