<?php
$bdd=new PDO('mysql:host=localhost;dbname=vente', 'root', 'root',array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));

if(isset($_GET['id'])){
$user=$bdd->prepare("DELETE FROM Utilisateur WHERE id=? ");
$user->execute(array($_GET['id']));
 header("Location:admin.php");
}


?>