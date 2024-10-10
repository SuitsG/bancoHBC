<?php

$archivoClientes = './json/clientes.json';

if (!file_exists($archivoClientes)) {
    die("Error: El archivo $archivoClientes no existe.");
}
// Leer el contenido del archivo JSON
$jsonContenido = file_get_contents($archivoClientes);
$clientes = json_decode($jsonContenido, true);

/*$clientes = json_decode(file_get_contents($archivoClientes), true);  */

/*Funciones*/

function ultimoCliente()
{
    global $clientes, $nombre, $tipoDocumento, $numeroDocumento, $tipoCuenta, $saldo, $numeroCuenta;
    $ultimoDato = end($clientes);
    $numeroCuenta = key($clientes);

    $nombre = $ultimoDato['nombreCompleto'];
    $tipoDocumento = $ultimoDato['tipoDocumento'];
    $numeroDocumento = $ultimoDato['numeroDocumento'];
    $tipoCuenta = $ultimoDato['tipoCuenta'];
    $saldo = $ultimoDato['saldo'];

}

function numeroIdentificar()
{
    return str_pad(random_int(0, 999999999), 10, '0', STR_PAD_LEFT); // Ejemplo con un rango menor
}

function informacionCliente(){


    return informacionCliente();
}
