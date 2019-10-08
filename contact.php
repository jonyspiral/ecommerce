<!DOCTYPE html>
<html lang="en" dir="ltr">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1,shrink-to-fit=no">

  <title>Formulario de contacto</title>

  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
  <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>

<link rel="stylesheet" href="css/styles.css">

<link rel="stylesheet" href="css/productos.css">

<link rel="stylesheet" href="css/master.css">
<link rel="stylesheet" href="css/login.css">
  </head>
  <body style="     flex-direction: column;      display: flex;      height: 100vh;      margin: 0;     ">


<?php require_once('partials/header.php')?>


  <div class="" style="
    margin: 2%;
    display: flex;
    flex-direction: column;
    justify-content: center;
    align-items: center;
">
    <div class="styleLogin " style="
    width: fit-content;
    display: flex;
    justify-content: center;
    align-content: center;
    padding: : 10%;
">


<form action="contact.php" method="post" style="

  width: fit-content;
  align-items: center;
  display: flex;
  flex-direction: column;
  justify-content: center;
  margin-left: 10%;
  margin-right: 10%;
  margin-top: 2%;
  margin-bottom: 2%;
">
  <label for="">Email</label>
  <input placeholder="Email" class="formControl" type="email" name="" value="">
  <label for="">Nombre</label>
  <input placeholder="Usuario-Nombre" class="formControl" type="text" name="" value="">
  <label for="">Contraseña</label>
  <input placeholder="Contraseña" class="formControl" type="password" name="" value="">
  <label for="">telefono</label>
  <input placeholder="numero de telefono" class="formControl" type="tel" name="" value="">

<div class="" style="
    align-items: center;
    display: flex;
    justify-content: center;
    margin: 2%;
">
  <textarea placeholder="Comentarios" name="name" rows="6" cols="80" style="width: 100%;"></textarea>

</div>


<input class="btn-primary btn" type="submit" name="Enviar" value="Enviar">
</form>
  </div>
</div>

  <?php require_once('partials/footer.php')?>

</body>
</html>
