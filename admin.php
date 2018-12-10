<?php
$bdd=new PDO('mysql:host=localhost;dbname=vente', 'root', 'root',array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
$users=$bdd->query("SELECT * FROM Utilisateur ORDER BY id DESC");
?>

<!DOCTYPE html>
<html>
<head>
	<title>Page principale</title>
</head>
<meta charset="utf-8">
<link rel="stylesheet" type="text/css" href="style.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">


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



<div class="table-responsive">
<table class="table table-hover table-sm" >
  <thead class="thead-dark">
<tr>
<th scope="col">id</th>
<th scope="col">Nom</th>
<th scope="col">Prenom</th>
<th scope="col">Ville</th>
<th scope="col">Pays</th>
<th scope="col">supprimer</th>
</tr>
 </thead>
  <tbody>

<?php while($user=$users->fetch())
{
	?>
<tr>
 <th scope="row"><?=$user['id']?></th>
 <td><?=$user['Nom']?></td>
  <td><?=$user['Prenom']?></td>
   <td><?=$user['Ville']?></td>
    <td><?=$user['Pays']?></td>
    <td> <a href="supprimer.php?id=<?=$user['id']?>">X</a></td>
	</tr>

<?php } ?>
</tbody>
</table>
</div>
</body>

<?php include "footer.php" ?>