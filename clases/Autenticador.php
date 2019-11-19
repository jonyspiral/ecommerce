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
    //var_dump($_SESSION);exit;
    if (isset($_POST['mantener'])) {
        //guardo la cookie del email y avatar
    $this->guardarCookie();
      }
      } else {
        $this->destruirRecuerdame();


      }
  }

public function destruirRecuerdame()
  {$email='';
  $avatar='';
    setcookie('mantener', $email, time() -1 );
  setcookie('mantenerAv',  $avatar, time() -1 );
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
