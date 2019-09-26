<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
<link rel="stylesheet" href="css/home.css">
    <link rel="stylesheet" href="css/contact.css">

    <meta charset="utf-8">
    <title>Formulario de contacto</title>

  </head>
  <body>
    <?php require_once('partials/header.php')?>

      <div  class="container">

  <nav class="navbar navbar-expand-lg navbar-dark bg-dark">

    <a  href="home.html">
        <img src="img\logo.png" alt="" class="navbar-brand" style="width:50px; border-radius:15%"   >
    </a>
    <a  href="cart.html">
          <img src="img\icons8-shopaholic-50.png" alt="" class="navbar-brand" style="width:50px; border-radius:15%"  >
    </a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarTogglerDemo02" aria-controls="navbarTogglerDemo02" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarTogglerDemo02">
  <ul class="navbar-nav mr-auto mt-2 mt-lg-0">
    <li class="nav-item active">
      <a class="nav-link" href="teleAudio.html">Televisores y audio</a>
    </li>
  <li class="nav-item active">
      <a class="nav-link" href="celulares.html">Celulares</a>
    </li>
    <li class="nav-item active">
      <a class="nav-link" href="notebooks.html" >Notebooks</a>
    </li>
  </ul>
  <a class="navbar-brand" target="_blank" href="login.html">Login</a>
  <form class="form-inline my-2 my-lg-0">
    <input class="form-control mr-sm-2" type="search" placeholder="Search">
    <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
  </form>
</div>
</nav>
</div>
   <?php require_once('partials/header.php')?>
    <div  class="container">
<form  action="index.html" method="post">
  <label for="">Email</label>
  <input placeholder="Email" class="form-control" type="email" name="" value="">
  <label  for="">Nombre</label>
  <input placeholder="Usuario-Nombre" class="form-control" type="text" name="" value="">
  <label for="">Contraseña</label>
  <input placeholder="Contraseña" class="form-control"type="password" name="" value="">
  <label for="">telefono</label>
  <input placeholder="numero de telefono" class="form-control"type="tel" name="" value="">




<div class="">

  <textarea placeholder="Comentarios" name="name" rows="8" cols="80"></textarea>

</div>


<input type="submit" name="Enviar" value="Enviar">
</form>

</div>


<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
  <ul class="navbar-nav mr-auto mt-2 mt-lg-0">
    <li class="nav-item active">
      <a class="nav-link" href="contact.html">Contacto</a>
    </li>
  <li class="nav-item active">
      <a class="nav-link" href="faqs.html">FAqs</a>
    </li>
    <li class="nav-item active">
      <a class="nav-link" href="user.html" >Mi Cuenta</a>
    </li>
    <li class="nav-item active">
    <img src="https://img.icons8.com/cute-clipart/64/000000/instagram-new.png">      </li>
    <li class="nav-item active">
    <img src="https://img.icons8.com/cute-clipart/64/000000/facebook.png">
  </li>
  </ul>
</div>
</nav>
</footer>
  <?php require_once('partials/footer.php')?>
</html>