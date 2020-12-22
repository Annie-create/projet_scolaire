
<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">

    <title>Openbook</title>



    <!-- Bootstrap core CSS -->
<link href="inscription.css" rel="stylesheet" >
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
      <li class="nav-item ">
        <a class="nav-link" href="page_accueil.php">Accueil <span class="sr-only">(current)</span></a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="">Qui sommes nous?</a>
      </li>


    </ul>

    <a class="btn btn-primary btn-lg" href="connexion.php" role="button">Se connecter &raquo;</a>

  </div>
</nav>
</header>

<main role="main">

  <!-- Main jumbotron for a primary marketing message or call to action -->
  <div class="jumbotron">
    <div class="container">
      <h1 class="display-3"> Openbook!</h1>
      <p><form class="form-horizontal" action='compte.php' method="POST">
  <fieldset>
    <div id="legend">
      <legend class="">Inscription</legend>
    </div>
    <div class="control-group">
      <!-- Username -->
      <label class="control-label"  for="Nom">Nom</label>
      <div class="controls">
        <input type="text" id="Nom" name="Nom" placeholder="" class="input-xlarge">
        <p class="help-block">Veuillez entrer votre nom</p>
      </div>
    </div>

    <div class="control-group">
      <!-- Username -->
      <label class="control-label"  for="Prenom">Prénom</label>
      <div class="controls">
        <input type="text" id="Prenom" name="Prenom" placeholder="" class="input-xlarge">
        <p class="help-block"> Veuillez entrer votre prénom </p>
      </div>
    </div>

    <div class="control-group">
      <!-- Username -->
      <label class="control-label"  for="Pseudo">Pseudo</label>
      <div class="controls">
        <input type="text" id="Pseudo" name="Pseudo" placeholder="" class="input-xlarge">
        <p class="help-block">Veuillez choisir votre Pseudo</p>
      </div>
    </div>

    <div class="control-group">
      <!-- Password-->
      <label class="control-label" for="pass">Mot de passe</label>
      <div class="controls">
        <input type="password" id="pass" name="password" placeholder="" class="input-xlarge">
        <p class="help-block">Veuillez choisir votre mot de passe</p>
      </div>
    </div>

    <div class="control-group">
      <!-- Password -->
      <label class="control-label"  for="password_confirm">Confirmez-votre mot de passe (Confirm)</label>
      <div class="controls">
        <input type="password" id="password_confirm" name="password_confirm" placeholder="" class="input-xlarge">
        <p class="help-block">Please confirm password</p>
      </div>
    </div>


    <div class="control-group">
      <!-- E-mail -->
      <label class="control-label" for="email">E-mail</label>
      <div class="controls">
        <input type="text" id="email" name="email" placeholder="" class="input-xlarge">
        <p class="help-block">Veuillez entrer votre email</p>
      </div>
    </div>



    <div class="control-group">
      <!-- Button -->
      <div class="controls">
        <button class="btn btn-success"> S'inscrire</button>
      </div>

    </div>


  </fieldset>
</form> </p><!-- /container -->

</main>


<footer class="container">
  <p>&copy; Groupe 2: Openbook</p>
</footer>

<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
      <script>window.jQuery || document.write('<script src="/docs/4.5/assets/js/vendor/jquery.slim.min.js"><\/script>')</script><script src="/docs/4.5/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script></body>

</html>
