<?php
session_start();
$bdd = new PDO('mysql:host=localhost;dbname=vente', 'root', 'root');

if(isset($_POST['formconnecxion'])) {
   $login = htmlspecialchars($_POST['login']);
   $mdp = sha1($_POST['mdp']);

   if(!empty($login) AND !empty($mdp)) 
   {
      $user=$bdd->prepare("SELECT * FROM Utilisateur WHERE Login = ? AND Mdp= ? ");
      $user->execute(array($login,$mdp));
      $userexsit = $user->rowCount();
      //si le compte de l'utlisateur exsite//
      if($userexsit==1)
      {
         //enregistre les information dans les SSESSION//
         $userinfo=$user->fetch();
         $_SESSION['Nom']=$userinfo['Nom'];
         $_SESSION['id']=$userinfo['id'];
         $_SESSION['Mdp']=$userinfo['Mdp'];
         $_SESSION['Login']=$userinfo['Login'];
         $_SESSION['Prenom']=$userinfo['Prenom'];
         $_SESSION['Ville']=$userinfo['Ville'];
         $_SESSION['Pays']=$userinfo['Pays'];
          header("Location:index2.php?id=".$_SESSION['id']);
        
          


      }
      else
      {
       $erreur="mot pass ou mail inncorect";  

      }
    }

   else
   {
       $erreur="Tout les champs doivent être complèter";
   }
}

?>


<html>
   <head>
      <title>TUTO PHP</title>
      <meta charset="utf-8">
   </head>

   <link rel="stylesheet" type="text/css" href="style.css">
   <body>
  

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





<div class="connexion">
<form method="POST" action="">
  <header>Connexion</header>
  <label>Login <span>*</span></label>
  <input type="text" placeholder="votre pseudo" id="pseudoconnect" name="login"/>
  <label>Password <span>*</span></label>
 <input type="password" placeholder="Votre password" id="mdpconnect" name="mdp"/>
 <input type="submit" value="se connecter" align="right" name="formconnecxion">
</form>

          <?php
         if(isset($erreur)) {
            echo '<font color="red">'.$erreur."</font>";
         }
         ?>
</div>
<?php include "footer.php" ?>
   </body>
</html>
<div>


