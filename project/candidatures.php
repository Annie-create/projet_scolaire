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
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="bootstrap.min.js"></script>

</head>
<body class="bg-light">
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
          <li class="nav-item">
            <a class="nav-link" href="lire.php">Mes lectures</a>
          </li>
          <li class="nav-item">
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

  <main role= "main" class="container">
    <h1 class="display-3"> <h1> Les candidatures à vos projets <?php echo $_SESSION['Pseudo']; ?> !</h1></h1>


    <?php
    // Connexion à la base de donnée

    $bdd = new PDO('mysql:host=localhost;dbname=openbook;charset=utf8', 'root', 'root',array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));


    $reponse = $bdd->prepare('SELECT * FROM projet where auteur=?');
    $reponse-> execute(array($_SESSION['Id_utilisateur']));

    while($donnees = $reponse->fetch()){
      echo
      '<div class="my-3 p bg-white rounded box-shadow">

      <strong class="d-inline-block mb-2 text-primary">'.$donnees['Genre'].'</strong>
      <h3 class="mb-0">
      <a class="text-dark" href="#">'.$donnees['Titre'].'</a>
      </h3>
      <div class="mb-1 text-muted">'.$donnees['Date_limite_cand'].'</div>';

      $reponse2 = $bdd->prepare('select * from personnages where id_projet_personnage= ?');
      $reponse2->execute(array($donnees['Id_projet']));
      while($donnees2 = $reponse2->fetch()){
        echo
        '
        <th scope="row">
        <p><strong class="d-block text-gray-dark"> '.$donnees2['Nom_P'].'</strong></td></p></th>
        ';

        $reponse3 = $bdd->prepare('select * from personnages , utilisateur , candidater
        where personnages.Id_personnages=candidater.Id_personnage and candidater.Id_utilisateur=utilisateur.Id_utilisateur and candidater.Id_personnage=?');
        $reponse3->execute(array($donnees2['Id_personnages']));
        while($donnees3 = $reponse3->fetch()){
          echo
          '<table>
          <th scope="row">
          <td >'.$donnees3['Pseudo'].'</td>
          <td><form action="candidatures.php" method="post">

          <input type="hidden" name="Id_personnages_trouve[]" value="'.$donnees2['Id_personnages'].'" />
          <input type="hidden" name="Id_utilisateur_accepter[]" value="'.$donnees3['Id_utilisateur'].'"/>
          <input type="hidden" name="Id_projet_candidature[]" value="'.$donnees['Id_projet'].'" />
          <input type="submit" name="Accepter" Id="Accepter" value="Accepter" class= "btn btn-outline-danger" onClick="alert(\'Accepter cette candidature\');
          "accepter()" this.disabled=true; this.value=\'Déja acceptée\'"/>
          <input type="submit" name="Refuser" value="Refuser" class= "btn btn-outline-danger" onClick="alert(\'Refuser cette candidature\') "/>
          </td>
          </form>
          </th>
          </table>'

          ;}'</div>';};}

          $reponse->closeCursor();
          ?>
        </main>




        <footer class="container">
          <p>&copy; Groupe 2: Openbook</p>
        </footer>

        <?php
        $bdd = new PDO('mysql:host=localhost;dbname=openbook;charset=utf8', 'root', 'root',array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
        if (isset ($_POST['Accepter'])){
          $req3 = $bdd->prepare('INSERT INTO participer(Id_utilisateur, Id_projet, Id_personnage) VALUES(?, ?, ?)');

          $liste_id_personnage=$_POST['Id_personnages_trouve'];
          $liste_id_utilisateur=$_POST['Id_utilisateur_accepter'];
          $liste_projet_candidature=$_POST['Id_projet_candidature'];

          for ($i = 0; $i < count($liste_id_utilisateur); $i++) {
            $req3->execute(array(
              $liste_id_utilisateur[$i],
              $liste_projet_candidature[$i],
              $liste_id_personnage[$i]
            ));};
            $req3->closeCursor();
            //supprimer les candidatures si elles ont été acceptées
            $req4=$bdd-> prepare('DELETE from candidater where Id_utilisateur=? and Id_projet=?');

            for ($i = 0; $i < count($liste_id_utilisateur); $i++) {

              $req4-> execute(array($liste_id_utilisateur [$i],
              $liste_projet_candidature[$i]));};

              $req4->closeCursor();
            };

            if (isset ($_POST['Refuser'])){
              $req5=$bdd-> prepare('DELETE from candidater where Id_utilisateur=? and Id_projet=?');
              $liste_id_personnage=$_POST['Id_personnages_trouve'];
              $liste_id_utilisateur=$_POST['Id_utilisateur_accepter'];
              $liste_projet_candidature=$_POST['Id_projet_candidature'];

              for ($i = 0; $i < count($liste_id_utilisateur); $i++) {

              $req5-> execute(array($liste_id_utilisateur [$i],
                                  $liste_projet_candidature[$i]));};

              $req5->closeCursor();
              };


            ?>


          </body>
