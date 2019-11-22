<?php
/**
 *
 */
class Carro
{
  private $producto;
 private $usuario;
 private $quantify;
 private $salePrice;
 private $state;
 private $creationDate;


  function __construct(Producto $producto,usuario $usuario,quantify $quantify,salePrice $salePrice ,state $state,)
  {
    $this->setProducto($producto);
    $this->setUsuario($usuario);
    $this->setCantidad($quantify);
    $this->setPrecio($salePrice);
    $this->setEstado($state);
    $this->setCreationDate();
  }
  public function getProducto(): Producto
  {
      return $this->producto;
  }

  public function setProducto(Producto $producto)
  {
      $this->producto = $producto;
  }
  public function getUsuario(): Usuario
  {
      return $this->producto;
  }

  public function setUsuario(Usuario $usuario)
  {
      $this->usuario = $usuario;
  }
  public function getCantidad(): integer
  {
      return $this->quantify;
  }

  public function setCantidad(integer $quantify)
  {
      $this->quantify = $quantify;
  }

  public function getPrecio(): decimal
  {
      return $this->salePrice;
  }

  public function setPrecio(decimal $salePrice)
  {
      $this->usuario = $salePrice;
  }
  public function getEstado(): integer
  {
      return $this->state;
  }

  public function setEstado(integer $state)
  {
      $this->estado = $state;
  }
  public function getCreationDate(): date
  {
      return $this->creationDate;
  }

  public function setCreationDate()
  {
      $this->estado = date();
  }



}
