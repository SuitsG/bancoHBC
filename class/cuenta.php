<?php
// Clase base para todas las cuentas
class Cliente{
    public $nombreCliente;
    protected $numeroDocumento;
    
}


class Cuenta extends Cliente{
    
    protected $numeroCuenta;
    protected $saldo;
 
    public function __construct($saldoInicial) {
        $this->saldo = $saldoInicial;
    }
 
    public function depositar($monto) {
        $this->saldo += $monto;
    }
 
    public function retirar($monto) {
        if ($monto <= $this->saldo) {
            $this->saldo -= $monto;
        } else {
            echo "Fondos insuficientes.";
        }
    }
 
    public function obtenerSaldo() {
        return $this->saldo;
    }
}
 
// Clase para la cuenta de ahorros
class CuentaAhorros extends Cuenta {
    private $tasaInteres;
 
    public function __construct($saldoInicial, $tasaInteres) {
        parent::__construct($saldoInicial);
        $this->tasaInteres = $tasaInteres;
    }
 
    public function aplicarInteres() {
        $this->saldo += $this->saldo * $this->tasaInteres;
    }
}
 
// Clase para la cuenta corriente
class CuentaCorriente extends Cuenta {
    private $limiteSobregiro;
 
    public function __construct($saldoInicial, $limiteSobregiro) {
        parent::__construct($saldoInicial);
        $this->limiteSobregiro = $limiteSobregiro;
    }
 
    public function retirar($monto) {
        if ($monto <= $this->saldo + $this->limiteSobregiro) {
            $this->saldo -= $monto;
        } else {
            echo "Sobregiro excedido.";
        }
    }
}




?>
