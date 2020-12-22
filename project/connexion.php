
<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">

    <title>Openbook</title>

    <link href="css/bootstrap.min.css" rel="stylesheet" >
    <link href="connexion_personalise.css" rel="stylesheet" >
    <link href="css_commun.css" rel="stylesheet">

  </head>
  <body class="text-center">
    <header>
    <nav class="navbar navbar-expand-md navbar-dark fixed-top bg-dark">


  <div class="collapse navbar-collapse" id="navbarsExampleDefault">
    <ul class="navbar-nav mr-auto">
      <li class="nav-item active">
        <a class="nav-link" href="page_accueil.php">Accueil <span class="sr-only">(current)</span></a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="contact.php">Qui sommes nous?</a>
      </li>


    </ul>


      <a class="btn btn-primary btn-lg" href="inscription.php" role="button">S'inscrire &raquo;</a>

  </div>
  </nav>
  </header>
<main role="main">



    <form class="form-signin"  method="POST" action="">
    <center> <img class="mb-4" src="img/openbook.jpg" alt="" width="72" height="72"></center>
    <center>  <h1 class="h3 mb-3 font-weight-normal">Se connecter</h1></center>
    <label for="inputEmail" class="sr-only">Adresse email</label>
    <input type="email" id="email" name="email" class="form-control" placeholder="Email address" required autofocus>
    <label for="inputPassword" class="sr-only">Mot de passe</label>
    <input type="password" id="password" name="password" class="form-control" placeholder="Password" required>

    <input class="btn btn-lg btn-primary btn-block" type="submit" name="Valider" value="Valider">

  </form>
  </body>

<?php
// Connexion à la base de donnée

$bdd = new PDO('mysql:host=localhost;dbname=openbook;charset=utf8', 'root', 'root',array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
if (isset ($_POST['Valider'])){

//  Récupération de l'utilisateur et de son pass
$emailR = htmlspecialchars(isset($_POST['email']) ? $_POST['email'] : NULL);
$password =htmlspecialchars(isset($_POST['password']) ? $_POST['password'] : NULL);

$req = $bdd->prepare('SELECT Id_utilisateur,Pseudo,email, pass FROM utilisateur WHERE email =?');
$req->execute(array($emailR));
$reponses = $req->fetch();
//$pass_bdd=htmlspecialchars($reponse['pass']);

//echo $emailR;
//$reponse->closeCursor();
            // Comparaison du pass envoyé via le formulaire avec la base
$isPasswordCorrect = password_verify($password, $reponses['pass']);
            if (!$reponses)
            {
                echo 'Mauvais identifiant ou mot de passe !';
            }
            else {
                    if ($isPasswordCorrect) {
                        session_start();
                        $_SESSION['Id_utilisateur'] = $reponses['Id_utilisateur'];
                        $_SESSION['Pseudo'] = $reponses['Pseudo'];
                        header('Location:accueil_utilisateur.php');

                    }
                    else {
                      echo 'Mauvais identifiant ou mot de passe !';

                    }
                }
$req->closeCursor();
}
 ?>


</div>
<footer class="container">
  <p>&copy; Groupe 2: Openbook</p>
</footer>


</html>
