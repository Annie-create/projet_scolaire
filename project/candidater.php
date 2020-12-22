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



  <main role= "main" class="container">
    <h1 class="display-3"> <h1> Du nouveau pour vous <?php echo $_SESSION['Pseudo']; ?> !</h1></h1>
    <p> Ici vous trouverez toutes les nouvelles candidatures pour des projets littéraire. Choisisez celles qui vous inspirent le plus </p>


    <?php
    // Connexion à la base de donnée

    $bdd = new PDO('mysql:host=localhost;dbname=openbook;charset=utf8', 'root', 'root',array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));


    $reponse = $bdd->prepare('SELECT * FROM projet where auteur<>?');
    $reponse-> execute(array($_SESSION['Id_utilisateur']));

    while($donnees = $reponse->fetch()){
      echo
      '<div class="my-3 p bg-white rounded box-shadow">

      <strong class="d-inline-block mb-2 text-primary">'.$donnees['Genre'].'</strong>
      <h3 class="mb-0">
      <a class="text-dark" href="#">'.$donnees['Titre'].'</a>
      </h3>
      <div class="mb-1 text-muted">'.$donnees['Date_limite_cand'].'</div>
      <p class="card-text mb-auto">'.$donnees['Resume'] .'</p>

      '
      ;
      $reponse2 = $bdd->prepare('SELECT * FROM projet, personnages where Id_projet=id_projet_personnage and Date_limite_cand>= now() and
      Id_projet=?');
      $reponse2->execute(array($donnees['Id_projet']));
      while($donnees2 = $reponse2->fetch()){
        echo
        '<table class="table table-hover">
        <th scope="row">
        <td id="'.$donnees2['Id_personnages'].'" name="'.$donnees2['Id_personnages'].'"><strong class="d-block text-gray-dark"> '.$donnees2['Nom_P'].'</strong></td>
        <td >'.$donnees2['Description_P'].'</td>';
         $verifier_candidature=$bdd->prepare('select * from candidater where Id_projet=? and Id_personnage=? and Id_utilisateur=?');
          $verifier_candidature-> execute(array($donnees['Id_projet'],
                                                $donnees2['Id_personnages'],
                                                $_SESSION['Id_utilisateur']

          ));
          $nbr_candidature=$verifier_candidature-> rowCount();
          if ($nbr_candidature<>0){ echo '
            <td> <form action="candidater.php" method="post">

            <input type="hidden" name="Id_personnages2[]" value="'.$donnees2['Id_personnages'].'" />
            <input type="hidden" name="Id_projet_candidature2[]" value="'.$donnees['Id_projet'].'"/>

            <input type="submit" disabled   value="Déja Candidater" class= "btn btn-outline-danger" onClick="alert(\'Confirmez-vous votre candidature?\') "/></td>

            </form>
            </th>
            </table>'
          ;} else{

          echo '
        <td>
        <form action="candidater.php" method="post">

        <input type="hidden" name="Id_personnages[]" value="'.$donnees2['Id_personnages'].'" />
        <input type="hidden" name="Id_projet_candidature[]" value="'.$donnees['Id_projet'].'"/>

        <input type="submit" name="Candidater"  value="Candidater" class= "btn btn-outline-danger" onClick="alert(\'Confirmez-vous votre candidature?\') "/></td>

        </form>
        </th>
        </table>'

        ;};}'</div>';}

        $reponse->closeCursor();
        ?>
      </main>

    </body>


    <footer class="container">
      <p>&copy; Groupe 2: Openbook</p>
    </footer>

    <?php
    $bdd = new PDO('mysql:host=localhost;dbname=openbook;charset=utf8', 'root', 'root',array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
    if (isset ($_POST['Candidater'])){

    $req3 = $bdd->prepare('INSERT INTO candidater(Id_utilisateur, Id_projet, Id_personnage, Statut) VALUES(?, ?, ?,"en cours")');


    $liste_id_personnages=$_POST['Id_personnages'];
    $liste_projet_candidature=$_POST['Id_projet_candidature'];
    for ($i = 0; $i < count($liste_id_personnages); $i++) {
      $req3->execute(array($_SESSION['Id_utilisateur'],
      $liste_projet_candidature[$i],
      $liste_id_personnages[$i])) ;};


    $req3->closeCursor();};

    ?>


    </html>
