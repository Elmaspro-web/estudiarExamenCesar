<?php
namespace Cls\Mvc2app;

class Pedido
{
    private $bd;

    public function __construct()
    {
        $this->bd = new Db();
    }
    public function getLastPedido() {
        $this->bd->query(
            "SELECT * FROM pedidos ORDER BY codPed DESC LIMIT 1;"
        );
        return $this->bd->registro();
    }

    public function create(){
        $this->bd->query("INSERT INTO pedidos (fecha, enviado, boss)VALUES (:fecha, :enviado, :boss)");
        $this->bd->bind(':fecha', date('Y-m-d'));
        $this->bd->bind(':enviado', true);
        $this->bd->bind(':boss', $_SESSION['user']);
        return $this->bd->execute();
    }
}