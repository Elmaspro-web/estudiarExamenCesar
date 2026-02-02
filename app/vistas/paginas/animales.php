<?php require_once RUTA_APP.'/vistas/inc/header.php'; ?>
<?php if (isset($datos)): ?>
    <h1><?= $datos['titulo'] ?></h1>

    <?php
    if (isset($_SESSION['carrito'])) {
        echo '<pre>';
        var_dump($_SESSION['carrito']);
        echo '</pre>';
    }
    ?>

    <table>
        <thead>
            <tr>
                <th>Nombre</th>
                <th>Tipo</th>
                <th>Poder</th>
                <th>Comprar</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($datos['animales'] as $animal): ?>
                <tr>
                    <td><?= $animal->nombre ?></td>
                    <td><?= $animal->tipo ?></td>
                    <td><?= $animal->poder ?></td>
                    <td>
                        <form action="/estudiarExamenCesar/carrito/addCarrito" method="POST">
                            <input type="number" name="cantidad" min="0" max="100">
                            <input type="hidden" name="id_animal" value="<?= $animal->id_animal ?>">
                            <input type="submit" value="Comprar">
                        </form>
                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>

    <a href="/estudiarExamenCesar/carrito/index">Carrito</a>
<!--    <pre>-->
            <?php //var_dump($datos); ?>
<!--    </pre>-->
<?php else: ?>
    <p>No hay datos</p>
<?php endif; ?>
<?php require_once RUTA_APP.'/vistas/inc/footer.php'; ?>
