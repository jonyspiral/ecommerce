<?php

class BaseDatos {




  public function buscarUsuarioEmail(string $email): ?Usuario
  {
    $usuario=null;
$conexion= New Conexion;
    //termino sequencia de conexion y ejecuto sql
  $sql = "SELECT  id , user, name, lastName, password, email, avatar from usuarios
  where  email= '$email'";//where  email= '$email'
  $query = $conexion->query($sql);
  $usuarioDb = $query->fetchAll(PDO::FETCH_ASSOC);

 if (!empty($usuarioDb)){
    $usuario = new Usuario(intval($usuarioDb[0]['id']),
    $usuarioDb[0]['user'],
    $usuarioDb[0]['name'],
    $usuarioDb[0]['lastName'],
    $usuarioDb[0]['email'],
    $usuarioDb[0]['password'],
     $usuarioDb[0]['avatar']);
   }
  //var_dump($usuario);exit;
    return $usuario;
  }
  public function existeUsuarioEmail(string $email): ?Usuario
  {

    //termino sequencia de conexion y ejecuto sql
  $sql = "SELECT  id , user, name, lastName, password, email, avatar from usuarios
  where  email= '$email'";//where  email= '$email'
  $query = $conexion->query($sql);
  $usuarioDb = $query->fetchAll(PDO::FETCH_ASSOC);
 if (!empty($usuarioDb)){
    $usuario = new Usuario(intval($usuarioDb[0]['id']),
    $usuarioDb[0]['user'],
    $usuarioDb[0]['name'],
    $usuarioDb[0]['lastName'],
    $usuarioDb[0]['email'],
    $usuarioDb[0]['password'],
     $usuarioDb[0]['avatar']);}
  //var_dump($usuario);exit;
    return $usuario;
  }
  public function guardarUsuario($user,$email,$name,$lastName,$password,$avatar) {
    $conexion= New Conexion;
    $password=password_hash($password,PASSWORD_DEFAULT);

      $sql = "INSERT INTO usuarios ( user, name, lastName, password, email, avatar) values (:user, :name,:lastName, :password, :email,:avatar)";
     $sentencia = $conexion->prepare($sql);
     $sentencia->bindValue(':user',$user);
     $sentencia->bindValue(':name',$name);
     $sentencia->bindValue(':lastName',$lastName);
     $sentencia->bindValue(':password',$password);
     $sentencia->bindValue(':email',$email);
     $sentencia->bindValue(':avatar',$avatar);

     $sentencia->execute();

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
