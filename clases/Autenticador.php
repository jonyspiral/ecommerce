<?php
class Autenticador {

public function loguear( $usuario)
    {//aqui es donde encontré al usuario y lo logeo.
if ($usuario) {
    $_SESSION['email'] = $usuario->getEmail();
    $_SESSION['name'] = $usuario->getName();
    $_SESSION['lastName'] = $usuario->getLastName();
    $_SESSION['avatar'] = $usuario->getAvatar();
    $_SESSION['user']= $usuario->getUser();
    $_SESSION['id']= $usuario->getId();
    if (isset($_POST['mantener'])) {
        //guardo la cookie del email y avatar
    $this->guardarCookie();
      }
      } else {
        $this->destruirRecuerdame();
        //sino lo redirijo a login.
      //  header('location:login.php');
      }
  }

public function destruirRecuerdame()
  {
    setcookie('mantener', $email, time() -1 );
  setcookie('mantener',  $avatar, time() -1 );
  }

  public function deslogear(Usuario $usuario)
    {
    session_destroy();
    }

  public function guardarCookie()
    {
  setcookie('mantener', $_SESSION['email'] , time() + 60*60*24*7 );
  setcookie('mantenerAv', $_SESSION['avatar'], time() + 60*60*24*7 );
    }
    }
