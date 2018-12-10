<?php
session_start();
$bdd=new PDO('mysql:host=localhost;dbname=vente', 'root', 'root');
?>

<!DOCTYPE html>
<html>
<head>
	<title>region</title>
	<link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>

		<?php if (isset($_GET['id'])) {
		$articles = $bdd->query('SELECT * FROM Objet WHERE id_region = '.$_GET['id']); //region //
		?>

<div class="menu2">
<ul>
	<li><a href="index.php">Easyshop</a></li>
	<li><a href="ajouterAnonce.php">Ajouter une annonce</a></li>
	<li><a href="offres.php">Offres</a></li>

	<li class="dropdown">
	<a href="javascript:void(0)" class="dropbtn">Se connecter</a>
	 <div class="dropdown-content">
      <a href="connexion.php">Connexion</a>
      <a href="inscription.php">Inscription</a>
    </div>
</ul>
</div>
<br><br><br>

		
<?php while ($article=$articles->fetch())  { ?>
 <div class="offre">
<table>
<tr>
<td><img src="miniatures/<?=$article['id'];?>.jpg" width="100"></td>
<td><p><?=$article['nom_objet']?></p></td>
<td><p><?=$article['Description']?></p></td>
<td><p><?=$article['Prix']?>$</p></td>

<hr>
</tr>
</div>
</table>
<?php
}

}

?>


<?php include "footer.php" ?>



</body>
</html>

