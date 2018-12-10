
<div class="menu2">
<ul>
  <li><a href="index2.php">Easyshop</a></li>
  <li><a href="ajouterAnonce.php?id=<?$_SESSION['id'];?>">Ajouter une annonce</a></li>
  <li><a href="offres.php">Offres</a></li>
     

  <li class="dropdown">
  <a href="javascript:void(0)" class="dropbtn"> <?php echo $_SESSION['Login'];?></a>
   <div class="dropdown-content">
      <a href="profil.php?id=<?= $_SESSION['id']; ?>"">Mes informations</a>
       <a href="deconnexion.php">Déconnexion</a>
      </div>
     </li>
     <li><a href="panier.php"  class="fa">&#xf07a; Panier</a></li>
     <form method="GET" action="recherche.php">
     <li><input type="text" placeholder="Search.." name="nom"></li>
     </form>
</ul>
</div>