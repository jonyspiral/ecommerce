<?php
$dsn='mysql:host=127.0.0.1;dbname=navshop;port=3306';
$user ='root';
$pass='root';
$conex='';
//esto muestra los errores con nombres de tablas y campos
$opt= [PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
//esto codifica para que no tenga errores de acentos
      PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8"];
try {
  $conex = new PDO($dsn, $user, $pass, $opt);

} catch (PDOException $e) {
  echo $e->getMessage();
}
