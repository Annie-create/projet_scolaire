<?php
// Connexion à la base de donnée

$bdd = new PDO('mysql:host=localhost;dbname=openbook;charset=utf8', 'root', 'root',array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
session_start();

// Suppression des variables de session et de la session
$_SESSION = array();
session_destroy();


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


   <div class="collapse navbar-collapse" id="navbarsExampleDefault">
     <ul class="navbar-nav mr-auto">
       <li class="nav-item active">
         <a class="nav-link" href="page_accueil.php">Accueil <span class="sr-only">(current)</span></a>
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
   <div class="jumbotron">
     <div class="container">
       <h1 class="display-3"> <h1>A bientôt !</h1>
       <p>Revenez très vite pour continuer l'aventure!</p>

     </div>
   </div>


 </main>
 </body>
 <footer class="container">
   <p>&copy; Groupe 2: Openbook</p>
 </footer>


 </html>
