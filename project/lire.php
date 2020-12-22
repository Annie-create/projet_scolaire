<?php
session_start();
?>



<!doctype html>
<html lang="en">
<head>
  <meta charset="utf-8">

  <title>Openbook</title>

  <link href="inscription.css" rel="stylesheet" >
  <link href="connexion_personalise.css" rel="stylesheet" >
  <link href="css_commun.css" rel="stylesheet">

</head>
<body class="text-center">
  <header>
    <nav class="navbar navbar-expand-md navbar-dark fixed-top bg-dark">


      <div class="collapse navbar-collapse" >
        <ul class="navbar-nav mr-auto">
          <li class="nav-item ">
            <a class="nav-link" href="accueil_utilisateur.php">Accueil <span class="sr-only"></span></a>
          </li>
          <li class="nav-item ">
            <a class="nav-link" href="espace_ecrivain.php"> Espace écrivain</a>
          </li>
          <li class="nav-item active">
            <a class="nav-link" href="lire.php">Mes lectures</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="mes_projets.php"> Mes écrits</a>
          </li>

          <li class="nav-item dropdown ">
            <a class="nav-link dropdown-toggle" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">Gestion des candidatures</a>
            <div class="dropdown-menu" >
              <a class="dropdown-item " href="candidatures.php">Candidatures reçues</a>
              <a class="dropdown-item " href="candidater.php">Candidater </a>

            </div>
          </li>
        </ul>

        <a class="btn btn-primary btn-lg" href="deconnexion.php" role="button">Se déconnecter &raquo;</a>
      </div>
    </nav>

  </header>


  <main role="main">
    <div class="jumbotron">
      <div class="container">
        <h1 class="display-3"> <h1>  Découvrez les histoires captivantes qui sont disponibles sur la plateforme</h1></h1>

        <div class="container">
          <?php
          $bdd = new PDO('mysql:host=localhost;dbname=openbook;charset=utf8', 'root', 'root',array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));


          $reponse = $bdd->query('SELECT * from projet where etat="Terminer"');

          while($donnees = $reponse->fetch()){

            echo
            '<div class="jumbotron">
            <h2>' .$donnees['Titre'].'</H2>
            <p> <strong>'.$donnees['Genre'].'</strong></p>
             <H5><strong>Résumé</strong></H5>
                <p>' .$donnees['Resume'].'</p>

              <div class= jumbotron>' .$donnees["Contenu"].'</div>



            </div>'

          ;}

        ?>


        </div>
      </div>
    </div>
  </div>


  </main>
</body>
<footer class="container">
  <p>&copy; Groupe 2: Openbook</p>
</footer>
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script>window.jQuery || document.write('<script src="/docs/4.5/assets/js/vendor/jquery.slim.min.js"><\/script>')</script>
<script src="/docs/4.5/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx"
crossorigin="anonymous"></script>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="bootstrap.min.js"></script>

</html>
