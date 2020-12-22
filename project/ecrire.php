<?php
session_start();
?>

<!doctype html>
<html lang="en">
<head>
  <meta charset="utf-8">

  <title>Openbook</title>

  <link href="inscription.css" rel="stylesheet" >
  <link href="css_commun.css" rel="stylesheet">
  <link href="ecrire_personalise.css" rel="stylesheet" >

</head>
<body class="text-center">
  <header>
    <nav class="navbar navbar-expand-md navbar-dark fixed-top bg-dark">


      <div class="collapse navbar-collapse" >
        <ul class="navbar-nav mr-auto">
          <li class="nav-item ">
            <a class="nav-link" href="accueil_utilisateur.php">Accueil <span class="sr-only"></span></a>
          </li>
          <li class="nav-item active">
            <a class="nav-link" href="espace_ecrivain.php"> Espace écrivain</a>
          </li>
          <li class="nav-item">
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
      <img src="img/ecrivain.jpg">
      <div class="container">
        <h1 class="display-3"> <h1>  Votre contribution </h1></h1>
        <p>Découvrez de nouveaux projets ou continuer ceux que vous avez commencé!</p>

        <div class="container">
            <form action="ecrire.php" method="post">
          <?php

          $bdd = new PDO('mysql:host=localhost;dbname=openbook;charset=utf8', 'root', 'root',array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
          $contenu='';
          if (isset ($_POST['ecrire'])){
            $reponse = $bdd->prepare('SELECT * from projet where Id_projet=?');
            $reponse->execute(array($_POST['Id_projet']));
            $donnees=$reponse->fetch();
            echo'<h2> '.$donnees['Titre'].'</h2>';
            $contenu = $donnees['Contenu'];
            echo '<input type="hidden" name="ecrire" value="ecrire"/>';

          }
          elseif (isset ($_POST['ecrire_participer'])){
            $reponse2 = $bdd->prepare('SELECT  * from projet, participer where	participer.Id_projet=projet.Id_projet and projet.Id_projet=? and  Id_utilisateur=?');
            $reponse2-> execute(array($_POST['Id_projet'],
            $_SESSION['Id_utilisateur']));
            $donnees2 = $reponse2->fetch();
            echo'<h2> '.$donnees2['Titre'].'<h2>';

            $contenu=$donnees2['Contenu'];
            echo '<input type="hidden" name="ecrire_participer" value="ecrire_participer"/>';

          }
            echo '<input type="hidden" name="Id_projet" value="'.$_POST['Id_projet'].'"/>';
        ?>
              <div class="md-form">
              <h4> Modifier votre texte</h4>
              <textarea placeholder="Placeholder" type="text" id="ajout_texte" name="ajout_texte" class="form-control" rows="30" cols="50">
                  <?php echo $contenu;?>
              </textarea>
            </div>
            <input type="submit" class="btn btn-success" name="ajouter_texte"value="Ajouter le texte"><span class="glyphicon glyphicon-chevron-down">
            </form>


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
  <?php
  if (isset ($_POST['ajouter_texte'])){
      $bdd = new PDO('mysql:host=localhost;dbname=openbook;charset=utf8', 'root', 'root',array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
      $req2 = $bdd->prepare('UPDATE projet SET Contenu =? WHERE Id_projet=?');
      if (isset ($_POST['ecrire'])){
        $req2-> execute(array($_POST['ajout_texte'],
        $_POST['Id_projet']));
        header('Location:mes_projets.php');
      }
      elseif (isset ($_POST['ecrire_participer'])){
        $req2-> execute(array($_POST['ajout_texte'],
        $_POST['Id_projet']));
        header('Location:espace_ecrivain.php');
      }
  }


        ?>
        </html>
