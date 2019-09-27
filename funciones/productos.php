<?php

function dameProductos () {

    $productos = [
        100 => [
            "id" => 1,
            "titulo" => "Vino Tino",
            "descripcion" => "Lorem Ipsum",
            "precio" => 300,
            "imagen" => "img-pdto-1.jpg",
            "enOferta" => true,
            'nuevo' => false,
        ],
        87 => [
            "id" => 2,
            "titulo" => "Carne Asada",
            "descripcion" => "Lorem Ipsum",
            "precio" => 500,
            "imagen" => "img-pdto-2.jpg",
            "enOferta" => false,
            'nuevo' => true,
        ],
        50 => [
            "id" => 3,
            "titulo" => "Paella",
            "descripcion" => "Lorem Ipsum",
            "precio" => 500,
            "imagen" => "img-pdto-3.jpg",
            "enOferta" => false,
            'nuevo' => false,
        ]
    ];

    return $productos;
}

function imprimirProductos () {
    $productos = dameProductos();

    foreach ($productos as $producto) { ?>
        <article class="product">
            <div class="photo-container">
                <img class="photo" src="images/<?= $producto['imagen'] ?>" alt="pdto 01">
                <?php if ($producto['enOferta'] === true) { ?>
                    <img class="special" src="images/img-descuento.png" alt="plato nuevo">
                <?php } ?>
                <a class="zoom" href="#">Ampliar foto</a>
            </div>
            <h2><?= $producto['titulo'] ?></h2>
            <p><?= $producto['descripcion'] ?></p>
            <a class="more" href="#">ver más</a>
        </article>
    <?php }
}

function obtenerProductoPorId($id) {
    $productos = dameProductos();

    foreach ($productos as $producto) {
        if ($id == (string) $producto['id']) {
            return $producto;
        }
    }

    return false;
}



//
