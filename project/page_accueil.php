
<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">

    <title>Openbook</title>

    <!-- Bootstrap core CSS -->
<link href="css/bootstrap.min.css" rel="stylesheet" >
<link href="css_commun.css" rel="stylesheet">


  </head>
  <body>
    <header>
    <nav class="navbar navbar-expand-md navbar-dark fixed-top bg-dark">
  <a class="navbar-brand" href="#">Menu</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarsExampleDefault" aria-controls="navbarsExampleDefault" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarsExampleDefault">
    <ul class="navbar-nav mr-auto">
      <li class="nav-item active">
        <a class="nav-link" href="#">Accueil <span class="sr-only">(current)</span></a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="">Qui sommes nous?</a>
      </li>


    </ul>

    <a class="btn btn-primary btn-lg" href="connexion.php" role="button">Se connecter &raquo;</a>
      <a class="btn btn-primary btn-lg" href="inscription.php" role="button">S'inscrire &raquo;</a>

  </div>
</nav>
</header>
<main role="main">

  <!-- Main jumbotron for a primary marketing message or call to action -->
  <div class="jumbotron">
    <div class="container">
      <h1 class="display-3">Bienvenue sur Openbook!</h1>
      <h2> Votre première plateforme d'écriture collaborative</H2>
      <p>
        Ici vous pouvez créer une histoire avec vos amis. Donnez vie à vos histoires à plusieurs.
Pour cela inscrivez-vous!
Vous découvrirez la littérature comme vous ne l’avez jamais connue.
</p>

    </div>
  </div>



  <div class="container">
    <!-- Example row of columns -->
    <div class="row">
      <h2> A découvrir sur Openbook!</h2>

      <div id="carouselExampleControls" class="carousel slide" data-ride="carousel">
  <div class="carousel-inner">
    <div class="carousel-item active">
      <img class="d-block w-100" src="img/carousel1.png" alt="First slide">
    </div>
    <div class="carousel-item">
      <img class="d-block w-100" src="img/carousel2.jpg" alt="Second slide">
    </div>
    <div class="carousel-item">
      <img class="d-block w-100" src="img/carousel3.jpg" alt="Third slide">
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

    </div>

    <hr>

  </div> <!-- /container -->

</main>

<footer class="container">
  <p>&copy; Groupe 2: Openbook</p>
</footer>


  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
     <script src="bootstrap.min.js"></script>
    </body>
</html>
