<?php
session_start();
$bdd = new PDO('mysql:host=localhost;dbname=vente', 'root', 'root');

if(isset($_GET['id']) AND !empty($_GET['id']))
 {
   $id_get=htmlspecialchars($_GET['id']);
   $articles=$bdd->prepare("SELECT * FROM Utilisateur WHERE id =?");
   $articles->execute(array($id_get));
   $user=$articles->fetch();

   }

   else
   {
      echo "erreur";
   }

?>

<!DOCTYPE html>
<html>
<head>
   <title>Mon profil</title>
   <link rel="stylesheet" type="text/css" href="style.css">
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

</head>
<header> 

</header>

<body>
   <?php include "menu.php" ?>
   <div class="profil">
   <h1>Mes coordonées</h1>
   <h4>Nom: <?php echo $_SESSION['Nom'];?> </h4>
   <h4>Prenom: <?php echo $_SESSION['Prenom'];?> </h4>
   <h4>Pays: <?php echo $_SESSION['Pays'];?> </h4>
   <h4>Villes: <?php echo $_SESSION['Ville'];?> </h4>
   <br><br>

   <h1>Mon login</h1>
   <h4>Login : <?php echo $_SESSION['Login'];?> </h4>
   <br><br><br>

   <h1>Mot de passe </h1>
   <h4>Mon mdp: <?php echo $_SESSION['Mdp'];?> </h4>
   <a href="changerprofil.php"> modifer</a>
</div>

 <?php include "footer.php" ?>

</body>
</html>


         