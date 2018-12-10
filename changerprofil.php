<?php
session_start();
$bdd = new PDO('mysql:host=localhost;dbname=vente', 'root', 'root');

if(isset($_SESSION['id']) )

{

$requser=$bdd->prepare("SELECT * FROM Utilisateur WHERE id = ? ");
$requser->execute(array($_SESSION['id']));
$user=$requser->fetch();


if(isset($_POST['newlogin']) AND !empty($_POST['newlogin']) AND $_POST['newlogin']!=$user['Login'])
{
$newnom=htmlspecialchars($_POST['newlogin']);
$insertpsedo=$bdd->prepare("UPDATE Utilisateur SET Login=?  WHERE id= ?");
$insertpsedo->execute(array($newnom,$_SESSION['id']));

}

if(isset($_POST['newmdp1']) AND !empty($_POST['newmdp1']) AND isset($_POST['newmdp2']) AND !empty($_POST['newmdp2'])){

$newmdp1=sha1($_POST['newmdp1']);
$newmdp2=sha1($_POST['newmdp2']);

if($newmdp1==$newmdp2)
{

$insertmdp=$bdd->prepare("UPDATE Utilisateur SET Mdp=?  WHERE id= ?");
$insertmdp->execute(array($newmdp1,$_SESSION['id']));
header('Location:connexion.php');
}
}
}
else
{
	$meg="no id";

}
?>


<html>
   <head>
      <title>identification</title>
      <meta charset="utf-8">
      <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
      <link rel="stylesheet" type="text/css" href="style.css">

      <style type="text/css">


    
      </style>



   </head>
 
   <body>

       <?php include "menu.php" ?>

      <div class="changer" align="center">
         <h2>Edition mon profil</h2>
      <div class="identification">

         

     <form method="POST" action="">
	Login : <input type="text" name="newlogin" value="<?= $user['Login']?>"><br>
	Mot de passe : <input type="password" name="newmdp1"><br>
	Confirmer mot de passe : <input type="password" name="newmdp2"><br>
	<input type="submit" name="valider" value="valider">
</form>

</div>
         <?php if(isset($meg)) {echo $meg;} ?>


      </div>

         <?php include "footer.php" ?>
        
   </body>
</html>