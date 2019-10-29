<?php
class Categoria{
    private $nombre;

    public function __construct (string $nombre)
    {
        $this->setNombre($nombre);
    }

    public function getNombre(): string
    {
        return $this->nombre;
    }

    public function setNombre(string $nombre)
    {
        $this->nombre = $nombre;
    }
}
?>
