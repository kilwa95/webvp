<?php
session_start();
$bdd = new PDO('mysql:host=localhost;dbname=vente', 'root', 'root',array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
// recuperer les artilces
 $articles = $bdd->query("SELECT * FROM Objet ORDER BY id");
 if(!isset($_SESSION['id'])){
header("Location:connexion.php");
}


?>

<!DOCTYPE html>
<html>
<head>
  <title>Accueil</title>
  <meta charset="utf-8">
  
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  

</head>
<body>

<?php include "menu.php" ?>


<h1>Touts les offres</h1>
<br><br>
<?php while ($article=$articles->fetch())  { ?>
<div class="offre">
<table>
<tr >
<td><img src="miniatures/<?=$article['id'];?>.jpg" width="130"></td>
<td><p><?=$article['nom_objet']?></p></td>
<td><p><?=$article['Description']?></p></td>
<td><a href="article.php?id=<?=$article['id']?>">Voir l'article</a></td>
<hr>
<hr>
</tr>
<br>

 <?php } ?>
</table>
</div>

    <br><br><br> <br><br><br>

  <?php include "footer.php" ?>


</body>
</html>


<!-- First Photo Grid-->

    


























