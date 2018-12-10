<?php
session_start();
$bdd=new PDO('mysql:host=localhost;dbname=vente', 'root', 'root',array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));

if(!isset($_SESSION['id'])){
header("Location:connexion.php");
}


if(isset($_POST['valider']) AND isset($_SESSION['id']))
{
	if(!empty($_POST['nom'])  AND !empty($_POST['prix']) AND !empty($_POST['contenu']) AND !empty($_POST['pays']))
	{
		$nom=htmlspecialchars($_POST['nom']);
		$cat=htmlspecialchars($_POST['categorie']);
		$region=htmlspecialchars($_POST['region']);
		$prix=htmlspecialchars($_POST['prix']);
		$contenu=htmlspecialchars($_POST['contenu']);
		$pays=htmlspecialchars($_POST['pays']);

		$obj = $bdd->prepare("INSERT INTO Objet(nom_objet, id_Categorie,Description,Prix,Pays,id_region) VALUES(?, ?,?,?,?,?)");
        $obj->execute(array($nom, $cat, $contenu, $prix, $pays,$region,));
        $lastid=$bdd->lastInsertId();

        if(isset($_FILES['miniature']) AND !empty($_FILES['miniature']['name'])){
        if(exif_imagetype($_FILES['miniature']['tmp_name'])== IMAGETYPE_JPEG){
        	$chemain='miniatures/'.$lastid.'.jpg';
			move_uploaded_file($_FILES['miniature']['tmp_name'], $chemain);

        }
        else{
        	$message="Votre message doit être au format jpg";
        }
    }
        $message="Votre objet a bien été enregistrer";

    


    }
    else{
    	$message="Veuiller entrer touts les champes ";

    }
}





?>


<!DOCTYPE html>
<html>
<head>
<title>Mettre un objet</title>
</head>
<link rel="stylesheet" type="text/css" href="style.css">
<body>

<?php include "menu.php" ?>


<div class="form">
<div align="center"><h3>Ajouter une annonce</h3></div>
	<form method="POST" action="" enctype="multipart/form-data" action="">
	Nom: <input type="text" name="nom" class="w3-input w3-border" placeholder="nom" id="nom"><br><br>


	<label>Catégories:</label>
	<select name="categorie"><br>
		<?php 
	$categorie = $bdd->query('SELECT * FROM Categorie order by Nom')->fetchAll();

	foreach ($categorie as $categories) {
	echo "<option value=\"".$categories['id']."\">".$categories['Nom']."</option>";
	}

	 ?> 	 
	</select> <br>





	<label>Régions:</label>
	<select name="region"><br>
		<?php 
	$region = $bdd->query('SELECT * FROM regions order by nom')->fetchAll();

	foreach ($region as $regions) {
	echo "<option value=\"".$regions['id']."\">".$regions['nom']."</option>";
	}
	 ?> 	 
	</select> <br>





		Prix:<input type="text" name="prix" placeholder="prix" id="prix"> €<br>
		Pays: <input type="text" name="pays" placeholder="pays" id="pays"><br>
		Description :<textarea id="contenu"  name="contenu"> </textarea><br><br>
	   	Mettre une photo:  <input type="file" name="miniature"/><br>
		<input type="submit" value="valider" name="valider"><br>
	</form>
</div>



	<?php if(isset($message)){echo $message;} ?>
<br><br><br>
<?php include "footer.php" ?>

</body>
</html>