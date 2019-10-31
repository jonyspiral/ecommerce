<?php
class Categoria{
    protected $id
    protected $nombre;

    public function __construct (string $nombre)
    {
        $this->setNombre($nombre);
    }
    public function getId(): integer
    {
        return $this->id;
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
