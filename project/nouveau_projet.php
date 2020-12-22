<?php
session_start();
 ?>
<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">

    <title>Openbook</title>

    <link href="inscription.css" rel="stylesheet" >
      <link href="css_commun.css" rel="stylesheet" >

<body class="bg-light">
  <header>
    <nav class="navbar navbar-expand-md navbar-dark fixed-top bg-dark">


      <div class="collapse navbar-collapse " >
        <ul class="navbar-nav mr-auto active">
          <li class="nav-item active ">
            <a class="nav-link" href="accueil_utilisateur.php">Accueil <span class="sr-only"></span></a>
          </li>
          <li class="nav-item active">
            <a class="nav-link" href="espace_ecrivain.php"> Espace écrivain</a>
          </li>
          <li class="nav-item active">
            <a class="nav-link" href="lire.php">Mes lectures</a>
          </li>
          <li class="nav-item active">
            <a class="nav-link" href="mes_projets.php"> Mes écrits</a>
          </li>

          <li class="nav-item dropdown active ">
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


        <div class="container">
        <div class="py-5 text-center">
        <img class="d-block mx-auto mb-4" src="img/openbook.jpg" alt="Openbook" width="72" height="72">
        <h2>Création d'un nouveau projet</h2>
        <p class="lead"> Veuillez renseigner ces champs pour publier votre projet et l'ouvrir aux candidatures.
        </p>
        </div>

                <div class="col-md-8 order-md-1">
                <h4 class="mb-3">Votre projet</h4>
                <form class="needs-validation"  method="POST" action='nouveau_projet.php'>

                <div class="row">
                  <div class="col-md-6 mb-3">
                    <label for="Titre">Titre</label>
                    <input type="text" class="form-control" id="Titre", name="Titre" placeholder="" value="" required>
                    <div class="invalid-feedback">
                      Donner un Titre valide
                    </div>
                  </div>

                  <div class="col-md-5 mb-3">
                    <label for="Langue">Langue</label>
                    <select class="custom-select d-block w-100" id="Langue" name="Langue" required>
                      <option value="">Choisissez une langue</option>
                      <option>Anglais</option>
                      <option>Allemand</option>
                      <option>Arabe</option>
                      <option>Chinois</option>
                      <option>Espagnol</option>
                      <option>Français</option>
                      <option>Russe</option>

                    </select>
                    <div class="invalid-feedback">
                      Veuillez choisir une langue
                    </div>
                  </div>

                </div>

                <div class="mb-3">
                  <label for="Description">Description</label>
                  <textarea type="text" class="form-control" id="Resume" name="Resume" placeholder="La description de mon projet..." required></textarea>
                  <div class="invalid-feedback">
                    Veuillez indiquer la description de votre projet.
                  </div>
                </div>

                <div class="mb-3">
                  <label for="Genre">Genre littéraire</label>
                  <select class="custom-select d-block w-100" id="Genre" name="Genre" required>
                    <option value="">Choisir</option>
                    <option>Aventure</option>
                    <option>Biographie</option>
                    <option>Comédie</option>
                    <option>Fantastique</option>
                    <option>Horreur</option>
                    <option>Poésie</option>
                    <option>Policier</option>
                    <option>Romance</option>
                    <option>Science-fiction</option>
                    <option>Thriller</option>

                  </select>
                  <div class="invalid-feedback">
                    Veuillez indiquer un genre littéraire
                  </div>
                </div>
                <div class="row">

                  <div class="col-md-4 mb-3">
                    <label for="date_limite">Date limite des candidatures</label>
                    <input type="date" class="form-control" id="Date_limite"name="Date_limite"  required>
                    <div class="invalid-feedback">
                      Veuillez indiquer une date limite pour nos candidatures.
                    </div>
                  </div>

                  <div class="col-md-4 mb-3">
                    <label for="state">Nombre de personnage</label>
                    <select class="custom-select d-block w-100" id="nb_personnage" name="nb_personnage" required>
                      <option value="">Choisir</option>
                      <option>1</option>
                      <option>2</option>
                      <option>3</option>
                      <option>4</option>
                      <option>5</option>
                      <option>6</option>
                      <option>7</option>
                      <option>8</option>
                      <option>9</option>
                      <option>10</option>
                      <option>11</option>
                      <option>12</option>
                      <option>13</option>
                      <option>14</option>
                      <option>15</option>
                      <option>16</option>
                      <option>17</option>
                      <option>18</option>
                      <option>19</option>
                      <option>20</option>

                    </select>
                    <div class="invalid-feedback">
                      Veuillez indiquer un nombre de personnage
                    </div>
                  </div>

                </div>
                <div class="col-md-4 mb-3">
                <label  for="image">Ajouter une image</label>
                <input id="image" name="image" class="input-file" type="file">
                </div>

                <hr class="mb-4">

                <h4 class="mb-3">Vos personnages</h4>

                <button class="btn btn-success ajout_perso" id="ajout_perso" name="ajout_perso">Ajouter un personnage</button>

                <div class="row personnages" id="personnages" name="personnages">

              </div>

          </div>
          <hr class="mb-4">
          <input class="btn btn-primary btn-lg btn-block" type="submit" name="Publier">
          </div>



  <footer class="container"> <p>&copy; Groupe 2: Openbook</p></footer>


 <?php
   if (isset ($_POST['Publier'])){
     $bdd = new PDO('mysql:host=localhost;dbname=openbook;charset=utf8', 'root', 'root',array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
     $req = $bdd->prepare('INSERT INTO projet(Titre, Langue, Resume,Genre,Date_limite_cand,auteur,etat) VALUES(?, ?, ?, ?, ?,?,"en cours")');

     $req->execute(array($_POST['Titre'],
                         $_POST['Langue'],
                         $_POST['Resume'],
                         $_POST['Genre'],
                         $_POST['Date_limite'],
                         $_SESSION['Id_utilisateur']));
     $req->closeCursor();


     $req2 = $bdd->prepare('SELECT Id_projet FROM projet WHERE Titre =?');
     $req2->execute(array($_POST['Titre']));
     $reponses2 = $req2->fetch();
     $Id_projet=$reponses2['Id_projet'];
     $req2->closeCursor();

      $req4 = $bdd->prepare('INSERT INTO personnages(Nom_P, Description_P, id_projet_personnage) VALUES(?, ?, ?)');

     $liste_nom_personnages=$_POST['Nom_personnage'];
     $liste_desc_personnages=$_POST['Description_Perso'];
     for ($i = 0; $i < count($liste_nom_personnages); $i++) {
       $req4->execute(array($liste_nom_personnages[$i],
                           $liste_desc_personnages[$i],
                           $Id_projet));
       $req4->closeCursor();
      }
        header('Location:mes_projets.php');
    }
  ?>
  <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
  <script>window.jQuery || document.write('<script src="/docs/4.5/assets/js/vendor/jquery.slim.min.js"><\/script>')</script>
  <script src="/docs/4.5/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx"
  crossorigin="anonymous"></script>

  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="bootstrap.min.js"></script>
    <script src="ajout_personnage.js"></script>
</html>
