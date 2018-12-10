<?php  
$bdd = new PDO('mysql:host=localhost;dbname=vente', 'root', 'root');

if(isset($_POST['valider'])){

   $nom = htmlspecialchars($_POST['nom']);
   $prenom = htmlspecialchars($_POST['prenom']);
   $ville = htmlspecialchars($_POST['ville']);
   $pays = htmlspecialchars($_POST['pays']);
   $login = htmlspecialchars($_POST['login']);
   $mdp = sha1($_POST['motdepasse']);
   $mdp2 = sha1($_POST['motdepasse2']);


if(!empty($_POST['nom']) AND !empty($_POST['prenom']) AND !empty($_POST['ville']) AND !empty($_POST['pays']) AND !empty($_POST['login']) AND !empty($_POST['motdepasse']) AND !empty($_POST['motdepasse2'])) {


 $logreq = $bdd->prepare("SELECT * FROM Utilisateur WHERE Login = ?");
 $logreq->execute(array($login));
 $loginexist = $logreq->rowCount();
 if($loginexist == 0) {
if($mdp==$mdp2){
$newuser = $bdd->prepare("INSERT INTO Utilisateur(Nom, Prenom, Ville, Pays, Login, Mdp) VALUES(?, ?, ?,?,?,?)");
 $newuser->execute(array($nom, $prenom, $ville,$pays,$login,$mdp));
 header("Location:connexion.php");
	}

	else
	{
		$message="Votre mot de passe n'est pas correcte";
	}

}else{
	$message="Votre login est déja exister";

}

	
}
else
{
	$message="Veuiller entrer touts champs";
}



}


?>

<!DOCTYPE html>
<html>
<head>
	<title>inscription au site</title>
</head>
<link rel="stylesheet" type="text/css" href="style.css">
<body>


	<div class="menu2">
<ul>
	<li><a href="index.php">esayshop</a></li>
	<li><a href="ajouterAnonce.php">ajouter une annonce</a></li>
	<li><a href="offres.php">offres</a></li>

	<li class="dropdown">
	<a href="javascript:void(0)" class="dropbtn">se connecter</a>
	 <div class="dropdown-content">
      <a href="connexion.php">connexion</a>
      <a href="inscription.php">inscription</a>
    </div>
</ul>
</div>
<br><br><br>
	

<div class="inscription">
<script type="text/javascript" src="form.js"></script>
<form method="POST" action="">
	 <header>Inscription</header>
 <label>Nom<span>*</span></label>
 <input type="text" name="nom"  id="nom"><br>
 <label>Prénom:<span>*</span></label>
 <input type="text" name="prenom"><br>
 <label>Ville:<span>*</span></label>
 <input type="text" name="ville"><br>
<label>Pays:<span>*</span></label>
 <input type="text" name="pays"><br>
 <label>Login: <span>*</span></label>
 <input type="text" name="login"><br>
 <label>Mot de passe: <span>*</span></label>
<input type="password" name="motdepasse"><br>
<label>Confirmer mot de passe: <span>*</span></label>
<input type="password" name="motdepasse2"><br>
<input type="submit" name="valider" value="valider">
</form>
 <?php
         if(isset($message)) {
            echo '<font color="red">'.$message."</font>";
         }
         ?>
        
<?php include "footer.php" ?>
</body>
</html>

