<?php

namespace Cls\Mvc2app;

use Cls\Mvc2app\Controlador;
use Cls\Mvc2app\Db;

class Animal extends Controlador
{
    private $bd;

    public function __construct()
    {
        $this->bd = new Db();
    }

    public function obtenerAnimales()
    {
        $this->bd->query("SELECT * FROM animales");
        return $this->bd->registros();
    }

    public function obtenerAnimal($num_registro)
    {
        $this->bd->query("SELECT * FROM animales WHERE id_animal = :id");
        $this->bd->bind(':id', $num_registro, \PDO::PARAM_INT);
        return $this->bd->registro();
    }

    public function deleteAnimal($num_registro)
    {
        $this->bd->query("DELETE FROM animales WHERE id_animal = :id");
        $this->bd->bind(':id', $num_registro, \PDO::PARAM_INT);
        return $this->bd->registro();
    }

}
