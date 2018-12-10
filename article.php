<?php 
session_start();
 $bdd = new PDO('mysql:host=localhost;dbname=vente;charset=utf8', 'root', 'root');

 if(isset($_GET['id']) AND !empty($_GET['id']))
 {
 	$id_get=htmlspecialchars($_GET['id']);
 	$articles=$bdd->prepare("SELECT * FROM Objet WHERE id =?");
 	$articles->execute(array($id_get));

 	if($articles->rowCount()==1)
 	{
 		$article=$articles->fetch();
 		$nom=$article['nom_objet'];
 		$categorie=$article['Categorie'];
 		$description=$article['Description'];
 		$prix=$article['Prix'];
 		$pays=$article['Pays'];
 		$id=$article['id'];


 	}
 	else
 	{
 		die('cettre article n existe pas');

 	}

 }
 else
 {
 	die('erreurs');

 }

?>
<!DOCTYPE html>
<html>
<head>
	<title>Accueile</title>
	 <meta charset="utf-8">
      <meta name="viewport" content="width=device-width, initial-scale=1">


   


<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<link rel="stylesheet" type="text/css" href="style.css">

</head>
<body>
<?php include "menu.php" ?>
<br><br><br>
<div align="center" class="article">
<img  src="miniatures/<?=$id?>.jpg" width="300" ><br>
<hr>
<h2>Description de l'article</h2>
<p><?=$description?></p>
<h2> Nom de l'article</h2>
<p><?=$nom?></p>
<h2> Prix:</h2>
<p><?=$prix?>€</p>
<button><a href="">ajouter panier</a></button>
<br><br>
</div>



<br><br><br>
<?php include "footer.php" ?>

</body>
</html>