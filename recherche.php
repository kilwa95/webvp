<?php
session_start();
$bdd=new PDO('mysql:host=localhost;dbname=vente', 'root', 'root',array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
if (isset($_GET['nom']))
{

	$nom=htmlspecialchars($_GET['nom']);
    $articles = $bdd->query('SELECT * FROM Objet WHERE nom_objet LIKE "%'.$nom.'%" ');

}

?>

<?php while ($article=$articles->fetch())  { ?>
<?php include "menu.php" ?>
<link rel="stylesheet" type="text/css" href="style.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

<br><br>
 <div class="Offre">
<table>
<tr>
<td><img src="miniatures/<?=$article['id'];?>.jpg" width="100"></td>
<td><p><?=$article['nom_objet']?></p></td>
<td><p><?=$article['Description']?></p></td>
<td><a href="article.php?id=<?=$article['id']?>">Voir l'article</a></td>
<hr>
</tr>
</div>
</table>
 <?php } ?>

 <?php include "footer.php" ?>