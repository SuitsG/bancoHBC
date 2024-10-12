<?php
require_once('./information/accessInformation.php');



// Verificar si se ha enviado el formulario
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  // Capturar los datos del formulario
  $nombre = $_POST['nombreCompleto'];
  $tipoDocumento = $_POST['tipoDocumento'];
  $numeroDocumento = (int) $_POST['numeroDocumento'];
  $tipoCuenta = $_POST['tipoCuenta'];
  $saldo = 0;


  // Generar un identificador único para el nuevo cliente
  $numeroCuenta = numeroIdentificar($clientes);

  // Crear un nuevo cliente
  $clientes[$numeroCuenta] = [
    "nombreCompleto" => $nombre,
    "tipoDocumento" => $tipoDocumento,
    "numeroDocumento" => $numeroDocumento,
    "tipoCuenta" => $tipoCuenta,
    "saldo" => $saldo
  ];


  file_put_contents($archivoClientes, json_encode($clientes));

  header('Location: mostrarDatos.php');
  exit();
 
} else {
  echo "No se ha enviado ningún dato.";
}
?>
