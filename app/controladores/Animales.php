<?php
namespace Cls\Mvc2app;
class Animales extends Controlador
{

    public function __construct()
    {
        $this->modelo = $this->modelo('animal');
        //echo 'Controlador páginas cargado'.'<br>';
        $this->vista = 'index'; //nombre de la vista por defecto, lo normal es que el servidor la asigne por defecto.
        $this->datos = ['titulo' => 'Animales'];

    }

    public function index()
    {
        $animales = $this->modelo->obtenerAnimales();
        $this->datos += [
            'animales' => $animales,
        ];

        $this->vista('paginas/animales', $this->datos);
    }
}