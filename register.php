

<?php
$usuario= '';
$email= '';
$password= '';
$confirmPassword = '';
$archivo= '';
$archivo= files_get_contents ( $_FILES( ) )

 ?>

<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>

    <link rel="stylesheet" href="css/login.css">
    <meta charset="utf-8">
    <title><registrese</title>
  </head>
  <body>
    <div class="container">

    <a id="logo" href="home.php">
    <img src="img\logo.png" alt="go to home" class="navbar-brand" style="width:10%; border-radius: 15%;"  >
    </a>



<form class="login" action="" method="post" enctype="multipart/form-data">
<a id="logo" href="">
  <img src="img\logo.png" alt="go to home" class="navbar-brand" style="width:35%; border-radius: 15%;"  >
  </a>
  <!-- files -->
  <label for="avatar">Subir avatar</label>
  <input type="file"  id="avatar" name="avatar">

  <label for="Usuario">Enter User</label>
  <input type="text" class="form-control" id="email" aria-describedby="emailHelp" placeholder="Enter un nombre de usuario" name="email"  value="<?php $usuario ?>">

  <label for="email">Enter Email</label>
    <input class="form-control" placeholder="Email"type="email" name="email" value="<?php $email ?>">

    <label for="contraseña">Enter Password</label>
  <input class="form-control" id="password" placeholder="Password" name="password" value="">

  <label for="$confirmPassword">Confirm Password</label>
  <input type="password" class="form-control" id="confirm-password" placeholder="Password" name="confirmPassword" value=" ">

  <div class="button">
      <button class="btn-link"  type="button" name="button">Send</button>

  </div>

>>>>>>> 964c47a311e068ebd20c086f55d7621aa67686fe

  </div>

</form>

  </body>
</html>
