<?php
class Producto {
    /** @var int */
    protected $id;
    /** @var string */
    protected $nombre;
    /** @var string */
    protected $imagen;
    /** @var float */
    protected $salePrice;
    protected $costPrice;
    protected $categoria;

    protected $Stock;

    protected $descripcion;



    public function __construct ($id, string $nombre, float $precio = 0,Color $imagen,int $categoria, int $stock,string $description)
    {

        $this->setNombre($precio);
        $this->precio = $precio;

        $this->setCategoria($categoria);
        $this->setDescripcion($descripcion);

        $this->setColor($color);// como validar con el id del color
        $this->setCategoria($categoria);

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
    $this->categoria = $descripcion;

    }







}
