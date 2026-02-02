<?php require_once RUTA_APP.'/vistas/inc/header.php'; ?>
<?php
if (isset($datos)){
    echo "<table>";
    foreach ($datos as $animal) {
        echo "<tr>";
        echo "<td>";
        echo $animal['animal']->nombre;
        echo "</td>";
        echo "<td>";
        echo $animal['cantidad'];
        echo "</td>";
        echo "</tr>";
    }
    echo "</table>";
}else{
    echo "No hay categorias";
}
?>
    <a href="/estudiarExamenCesar/carrito/transacction">Realizar Pedido</a>
<?php require_once RUTA_APP.'/vistas/inc/footer.php'; ?>