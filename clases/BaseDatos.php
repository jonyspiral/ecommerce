<?php


class BaseDatos  {

  public function buscarUsuarioEmail(string $email): ?Usuario  {

  $usuario=null;
  $conexion= New Conexion;
  //  $sql = ("SELECT * from usuarios");
  //  $stmt = $conexion->prepare($sql);
  // $stmt->execute();
  // $resultado = $stmt->fetchAll(PDO::FETCH_ASSOC);
  // var_dump($resultado);
  //termino sequencia de conexion y ejecuto sql
  $sql = "SELECT  id , user, name, lastName, password, email, avatar from usuarios
  where  email= '$email'";//where  email= '$email'
  $query = $conexion->query($sql);
  $usuarioDb = $query->fetchAll(PDO::FETCH_ASSOC);
  //var_dump($usuarioDb);
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
  public function buscarUsuarioUser(string $user): ?Usuario  {
  $conexion= New Conexion;
  $usuario=null;

  //termino sequencia de conexion y ejecuto sql
  $sql = "SELECT  id , user, name, lastName, password, email, avatar from usuarios
  where  user= '$user'";//where  email= '$email'
  $query = $conexion->prepare($sql);

  $usuarioDb = $query->fetchAll(PDO::FETCH_ASSOC);
  //var_dump($usuarioDb);
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

  public function guardarUsuario($user,$email,$name,$lastName,$password,$avatar) {
  $conexion= New Conexion;
  $password=password_hash($password,PASSWORD_DEFAULT);
  $sql = "INSERT INTO usuarios ( user, name, lastName, password, email, avatar) values ('$user', '$name','$lastName', '$password', '$email','$avatar')";
  $sentencia =  $conexion->query($sql);

  //$sentencia = $query->fetch(PDO::FETCH_ASSOC);
    }

    public function editarUsuario($user,$email,$name,$lastName,$newPass,$avatar) {

    //   $user = (isset($datos['user'])) ? $datos['user'] : $_SESSION['user'] ;
    //   $name= (isset($datos['name'])) ? $datos['name'] :  $_SESSION['name'] ;
    //   $lastName = (isset($datos['lastName'])) ? $datos['lastName'] :  $_SESSION['lastName'] ;
    //   $avatar = (isset($datos['avatar'])) ? $datos['avatar'] :  $_SESSION['avatar'] ;
    //  $newPassword=(isset($datos['newPassword'])) ? $datos['newPassword'] : '' ;
    //   $email= $_SESSION['email'];
   $password=password_hash($newPass,PASSWORD_DEFAULT);
    // $pass=(isset($datos['newPassword'])) ?",password='$password'":'';

    $conexion= New Conexion;
  $bd = new BaseDatos;
   $sql = "UPDATE usuarios SET user ='$user', name ='$name', lastName='$lastName',password='$password', avatar='$avatar' where  email= '$email'";
   $query = $conexion->query($sql);
   $usuario= $bd->buscarUsuarioEmail($email);
   $_SESSION['email'] = $usuario->getEmail();
   $_SESSION['name'] = $usuario->getName();
   $_SESSION['lastName'] = $usuario->getLastName();
   $_SESSION['avatar'] = $usuario->getAvatar();
   $_SESSION['user']= $usuario->getUser();
   $_SESSION['id']= $usuario->getId();



      }


    public function subirAvatar($archivo, $nombre) {

          if (!file_exists('img/avatar')) {
              mkdir('img/avatar');
          }

          $ext = pathinfo($archivo['name'], PATHINFO_EXTENSION);

          $avatar = $nombre . '.' . $ext;
          //la muevo a mi carpeta avatars
          move_uploaded_file($archivo['tmp_name'], 'img/avatar/' . $avatar);

          return $avatar;
      }


    public function guardarProducto(Producto $prod)
    {

    }

    public function actualizarProducto(Producto $prod)
    {

    }
    //  public function existeUsuarioEmail(string $email): ?Usuario
    //  {
    //  $username='';
    //
    //    //termino sequencia de conexion y ejecuto sql
    //  $sql = "SELECT  id , user, name, lastName, password, email, avatar from usuarios
    //  where  email= '$email'";//where  email= '$email'
    //  $query = $conex->query($sql);
    //  $usuarioDb = $query->fetchAll(PDO::FETCH_ASSOC);
    //
    // // $sentencia = $conex->prepare($sql);
    // // $sentencia->bindValue(':email', $_POST['email']);
    // // $sentencia->execute()->fetchAll(PDO::FETCH_ASSOC);
    // if (!empty($usuarioDb)){
    //  $usuario = new Usuario(intval($usuarioDb[0]['id']),
    //  $usuarioDb[0]['user'],
    //  $usuarioDb[0]['name'],
    //  $usuarioDb[0]['lastName'],
    //  $usuarioDb[0]['email'],
    //  $usuarioDb[0]['password'],
    //  $usuarioDb[0]['avatar']);}
    //  //var_dump($usuario);exit;
    //  return $usuario;
    //  }

}
