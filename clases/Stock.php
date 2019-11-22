<?php
class Stock {
  Protected $productoId;
  Protected $quantify;
    Protected $dateUpdate;

  Public function __construct ($productoId,$cant){


    $this->setId($id);
    $this->setCant($quantify);
    $this->setDateupdate($dateUpdate);


  }
  public function setId( $id)
  {
      $this->id = $id;
  }

  public function setCant(string $quantify)
  {
      $this->quantify = $quantify;
  }
  public function setDateUpdate()
  {
      $this->ateUpdate = date();
  }

  public function getId()
  {
      return $this->id;
  }
  public function getCantidad()
  {
      return $this->$quantify;
  }
  public function getDateUpdate()
  {
      return $this->Dateupdate;
  }
  public function aumentarStock(Producto $producto,integer $quantify )
// falta la parte que buscaria al id del producto
  {$NewQuantify=$this->quantify+ $quantify
      return $NewQuantify;
  }
  public function disminuirStock()


  {$NewQuantify=$this->quantify- $quantify
      return $NewQuantify;
  }

}
