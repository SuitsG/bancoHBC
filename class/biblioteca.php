<?php

$datosCliente = file_get_contents('./json/clientes.json');
$datos = json_decode($datosCliente, true);




echo $claveUltimo;
echo '<br>';
echo $nombre;

?>