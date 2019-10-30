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
    /** @var Rangotalle **/
    protected $rangoTalle;
    /** @var Stock **///pueedo pedir stock aca?

    protected $Stock;

    public function __construct (string $nombre, float $prize = 0,Color $color,Rangotalle $rangoTalle )
    {

        $this->setNombre($nombre);
        $this->precio = $prize;
        $this->setColor($color);// como validar con el id del color
        $this->setCategoria($categoria);
        $this->setRangoTalle($rangoTalle);

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
    public function getRangoTalle(): Rangotalle
    {
        return $this->Rangotalle;
    }

    public function setRangotalle(Rangotalle $Rangotalle)
    {
        $this->Rangotalle = $Rangotalle;
    }
    public function getStock(): Stock
    {
        return $this->Stock;
    }

    public function setStock(Rangotalle $Stock)
    {
        $this->Stock = $Stock;
    }
  }









    /*public function dameElNombreDeLaCategoria(): string
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
