<?php

namespace Cls\Mvc2app;

class PedidosProducto
{
    private $bd;

    public function __construct()
    {
        $this->bd = new Db();
    }

    public function create($id_pedido, $data)
    {
        try {
            $this->bd->beginTransaction();

            $this->bd->query("INSERT INTO pedidosProducto (pedido, animal, unidades)
                          VALUES (:pedido, :animal, :unidades)");

            foreach ($data as $animal => $unidades) {
                $this->bd->bind(':pedido', $id_pedido);
                $this->bd->bind(':animal', $animal);
                $this->bd->bind(':unidades', $unidades);
                $this->bd->execute();
            }

            $this->bd->commit();

        } catch (\PDOException $e) {
            $this->bd->rollBack();
            throw $e;
        }
    }
}
