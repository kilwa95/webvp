
<!DOCTYPE html>
<html>
<head>
	<title>Page principale</title>
</head>
<meta charset="utf-8">
<link rel="stylesheet" type="text/css" href="style.css">
<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
<style type="text/css">
	* {
  margin : 0;
  padding: 0;
}
</style>
<body>


	       

<div class="menu2">
<ul>
	<li><a href="index.php">Easyshop</a></li>
	<li><a href="ajouterAnonce.php">Ajouter une annonce</a></li>
	<li><a href="offres.php">Offres</a></li>

	

	<li class="dropdown">
	<a href="javascript:void(0)" class="dropbtn" > Se connecter</a>
	 <div class="dropdown-content">
      <a href="connexion.php">Connexion</a>
      <a href="inscription.php">Inscription</a>
    </div>
</ul>
</div>
<br>

<?php include "map.php" ?>
<br><br><br>

<?php include "footer.php" ?>

</body>
</html>