<!doctype html>
<html>
<head>
<meta charset="utf-8">
<body>
<?php
// Sous MAMP
$bdd = new PDO('mysql:host=localhost;dbname=openbook;charset=utf8', 'root', 'root');
?>
<title>compte</title>
<link href="projet.css" rel="stylesheet" type="text/css"/>
</head>
<?php
// Vérification de la validité des informations

// Hachage du mot de passe
$pass_hache = password_hash($_POST['password'], PASSWORD_DEFAULT);


$req = $bdd->prepare('INSERT INTO utilisateur(Nom, Prenom, email, Pseudo, pass) VALUES(?, ?, ?,  ?, ?)');

$req->execute(array($_POST['Nom'],
                    $_POST['Prenom'],
                    $_POST['email'],
                    $_POST['Pseudo'],
                    $pass_hache));
header('Location:inscription.php');

?>


</body>
</html>
