<?php

class CuentaBancaria {
    
    protected $numeroCuenta;
    protected $nombreCliente;
    protected $saldo;

    function __construct($numeroCuenta,$nombreCliente,$saldoInicial)
    {
        $this->numeroCuenta = $numeroCuenta;
        $this->nombreCliente = $nombreCliente;
        $this->saldo = $saldoInicial;
    }
}

?>