<?php
// Ruta del archivo JSON
session_start();
require_once('./information/accessInformation.php');


if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  // Capturar los datos del formulario
  $verificarCuenta = $_POST['numeroCuenta'];
  $numeroCuenta = $verificarCuenta;

  if (array_key_exists($numeroCuenta, $clientes)) {
    $_SESSION['numeroCuenta'] = $numeroCuenta;
    header('Location: ../showInformation/accountExists.php');
  } else {
    header('Location: ../showInformation/accountNotExists.php');
    exit();
  }
} else {
  echo "No se ha enviado ningún dato.";
}
