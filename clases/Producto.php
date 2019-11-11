<?php
class Producto {
    /** @var int */
    protected $id;
    /** @var string */
    protected $nombre;
    /** @var float */
    protected $precio;
    /** @var Colores **/
    protected $color;
    /** @var Categoria **/
    protected $categoria;
    /** @var Talle **/
    protected $Talle;
    /** @var Stock **///pueedo pedir stock aca?
    protected $Stock;

    protected $descripcion;



    public function __construct (string $nombre, float $prize = 0,Color $color,talle $Talle )

    {

        $this->setNombre($nombre);
        $this->precio = $prize;

        $this->setCategoria($categoria);
        $this->setDescripcion($descripcion);

        $this->setColor($color);// como validar con el id del color
        $this->setCategoria($categoria);
        $this->setTalle($Talle);
        $this->setDescripcion($descripcion);

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
    public function getDescripcion(): Descripcion
    {
        return $this->descripcion;
    }

    public function setDescripcion(Descripcion $descripcion)

    public function getTalle(): talle
    {
        return $this->talle;
    }

    public function setTalle(talle $talle)
    {
        $this->talle = $talle;
    }
    public function getStock(): Stock
    {
        return $this->Stock;
    }

    public function setStock(Stock $Stock)

    {
        $this->Stock = $Stock;
    }
  }









    /*public function dameElNombreDeLaCategoria(): string
>>>>>>> b422862df811bdf03189aec27299f251abb2c550
    {
        $this->Descripcion = $descripcion;
    }

    /*public function dameElNombreDeLaCategoria(): string
    {
        return 'La categoria es: ' . $this->getCategoria()->getNombre();
    }*/


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
