<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
      <meta charset="utf-8">
      <meta name="viewport" content="width=device-width, initial-scale=1,shrink-to-fit=no">

    <title>Home</title>

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>

<link rel="stylesheet" href="css/home.css">
</head>
<body>
  <!-- cabecera -->
        <?php require_once('partials/header.php')?>

<main class="container" role="main">

  <div id="carouselExampleControls" class="carousel slide" data-ride="carousel">
  <div class="carousel-inner">
    <div class="carousel-item active">
      <img src="img/tvs.png" class="d-block w-100" alt="...">
    </div>
    <div class="carousel-item">
      <img src="img/mujer.png" class="d-block w-100" alt="...">
    </div>
    <div class="carousel-item">
      <img src="img/cuotas.png" class="d-block w-100" alt="...">
    </div>
  </div>
  <a class="carousel-control-prev" href="#carouselExampleControls" role="button" data-slide="prev">
    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
    <span class="sr-only">Previous</span>
  </a>
  <a class="carousel-control-next" href="#carouselExampleControls" role="button" data-slide="next">
    <span class="carousel-control-next-icon" aria-hidden="true"></span>
    <span class="sr-only">Next</span>
  </a>
</div>
<!--comienzan los cards -->
<div id="grupoTarjeta" class="container">


<div class="card" >
  <img src="https://img.icons8.com/ios-filled/50/000000/retro-tv.png" class="card-img-top">
  <div class="card-body">
    <h5 class="card-title">Televisores y audio</h5>
    <p class="card-text">Los mejores televisores del mercado, al mejor precio en cuotas y envio gratis.</p>
    <a href="teleAudio.html" class="btn btn-primary">ir a...</a>
  </div>
</div>

<div class="card" >
  <img src="img\icons8-varios-smartphones-50.png" class="card-img-top">
  <div class="card-body">
    <h5 class="card-title">smartphones</h5>
    <p class="card-text">Los mejores smartphones del mercado, al mejor precio en cuotas y envio gratis.</p>
    <a href="celulares.html" class="btn btn-primary">ir a...</a>
  </div>
</div>

<div class="card" >
  <img src="img\icons8-aplicación-para-laptop-50.png" class="card-img-top">
  <div class="card-body">
    <h5 class="card-title">Notebooks</h5>
    <p class="card-text">Los mejores notebooks del mercado, al mejor precio en cuotas y envio gratis.</p>
    <a href="notebooks.html" class="btn btn-primary">ir a...</a>
  </div>
</div>
</div>
</main>
  <!-- FOOTER -->
        <?php require_once('partials/footer.php')?>
  </body>
</html>
