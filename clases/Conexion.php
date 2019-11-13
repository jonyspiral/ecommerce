<?php
/**
 *
 */
class Conexion extends PDO {
private $dsn='mysql:host=127.0.0.1;dbname=navshop;port=3306';
private $userdb ='root';
private $pass='root';

public function __CONSTRUCT() {
    $opt= [PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
    //esto codifica para que no tenga errores de acentos
          PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8"];
        try{

           parent::__CONSTRUCT($this->dsn, $this->userdb, $this->pass,$opt);

        }catch(PDOException $e){
           echo 'Ha surgido un error y no se puede conectar a la base de datos. Detalle: ' . $e->getMessage();
           exit;
        }
     }


}
