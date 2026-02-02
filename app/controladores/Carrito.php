<?php
namespace Cls\Mvc2app;
class Carrito extends Controlador
{
    private $modelo_pedidos;
    private $modelo_pedidos_productos;
    public function __construct()
    {
        $this->modelo = $this->modelo('animal');
        $this->modelo_pedidos = $this->modelo('pedido');
        $this->modelo_pedidos_productos = $this->modelo('pedidosProducto');
    }

    public function index(){
        session_start();
        foreach ($_SESSION['carrito'] as $key => $value) {
            $animal = $this->modelo->obtenerAnimal($key);
            $data[$key] = [
                "animal" => $animal,
                "cantidad" => $value
            ];
        }
        $this->vista("paginas/carrito", $data);
    }

    public function addCarrito(){
        session_start();

        $id = $_POST['id_animal'];
        $cantidad = (int)$_POST['cantidad'];

        if (!isset($_SESSION['carrito'][$id])) {
            $_SESSION['carrito'][$id] = 0;
        }
        $_SESSION['carrito'][$id] += $cantidad;

        header('location: /estudiarExamenCesar/animales/index');
    }

    public function transacction(){
        session_start();
        $_SESSION['user'] = '1';
        if (isset($_SESSION['carrito'])){
            $this->modelo_pedidos->create();
            $ultimo_pedido = $this->modelo_pedidos->getLastPedido();
            $this->modelo_pedidos_productos->create($ultimo_pedido->codPed, $_SESSION['carrito']);
        }
        header('location: /estudiarExamenCesar/animales/index');
    }
}
