<?php

class BaseDatos {

  public function buscarUsuarioEmail(string $email): ?Usuario
  {
    $username='';
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
    //termino sequencia de conexion y ejecuto sql
  $sql = "SELECT  id , user, name, lastName, password, email, avatar from usuarios
  where  email= '$email'";//where  email= '$email'
  $query = $conex->query($sql);
  $usuarioDb = $query->fetchAll(PDO::FETCH_ASSOC);


 // $sentencia = $conex->prepare($sql);
 // $sentencia->bindValue(':email', $_POST['email']);
 // $sentencia->execute()->fetchAll(PDO::FETCH_ASSOC);

   //$usuarioDb['id']='';
  //   'id'=>
  //     'user'=>'alberto',
  //     'name'=> 'alberto',
  //     'lastName'=> 'albert',
  //     'email' => 'a@a.com',
  //     'password' => password_hash('123456', PASSWORD_DEFAULT),
  //     'avatar' => 'a@a.com.jpg'
  //   ];

    $usuario = new Usuario(intval($usuarioDb[0]['id']),
    $usuarioDb[0]['user'],
    $usuarioDb[0]['name'],
    $usuarioDb[0]['lastName'],
    $usuarioDb[0]['email'],
    $usuarioDb[0]['password'],
     $usuarioDb[0]['avatar']);
  //var_dump($usuario);exit;
    return $usuario;
  }

    public function getBaseDatos( )
    {

    }
    public function guardarProducto(Producto $prod)
    {

    }

    public function actualizarProducto(Producto $prod)
    {

    }

}
