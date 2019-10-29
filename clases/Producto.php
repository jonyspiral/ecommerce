<?php
class Producto {
    /** @var string */
    private $nombre;
    /** @var int */
    private $id;
    /** @var float */
    private $precio;
    /** @var Categoria **/
    private $categoria;

    public function __construct (string $nombre, float $prize = 0)
    {
        $this->setNombre($nombre);
        $this->precio = $prize;
    }

    public function getNombre(): ?string
    {
        return $this->nombre;
    }

    public function setNombre(string $nombreProducto)
    {
        $this->nombre = $nombreProducto;
    }

    public function getPrecio(): ?float
    {
        return $this->precio;
    }

    public function setPrecio(float $saraza)
    {
        $this->precio = $saraza;
    }

    public function darTotal(int $cantidad): float
    {
        return $this->getPrecio() * $cantidad;
    }

    public function getCategoria(): Categoria
    {
        return $this->categoria;
    }

    public function setCategoria(Categoria $categoria)
    {
        $this->categoria = $categoria;
    }

    public function dameElNombreDeLaCategoria(): string
    {
        return 'La categoria es: ' . $this->getCategoria()->getNombre();
    }


    public function guardar(BaseDatos $bd)
    {
        if (!$this->id) {
            echo 'me voy a insertar';
            $bd->guardarProducto($this);
        } else {
            echo 'voy a actualizarme';
            $bd->actualizarProducto($this);
        }

    }



}
