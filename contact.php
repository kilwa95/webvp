<?php
session_start();
if(isset($_POST['nom'])AND isset($_POST['prenom'])AND isset($_POST['mail']) AND isset($_POST['nom']) AND isset($_POST['message']) ){

if(!empty($_POST['nom']) AND !empty($_POST['prenom']) AND !empty($_POST['mail']) AND !empty($_POST['message']) ){


mail("lga.sig.khaled@gmail.com", "formule de contact", "salut");

$message="Le mail a été envoyée";

}
else
{
	$message="Veuiller remplir toutes les champes";
}

}


?>
<!DOCTYPE html>
<html>
<head>
	<title>contact</title>
	<style type="text/css">
.contact h3{
color:grey;
padding:0;
}

.contact{
border-radius: 5px;
 background-color: #f2f2f2;
padding: 20px;
}
.contact input[type=text],input[type=email], select, textarea {
    width: 100%;
    padding: 12px;
    border: 1px solid #ccc;
    border-radius: 4px;
    box-sizing: border-box;
    margin-top: 6px;
    margin-bottom: 16px;
    resize: vertical;
}
.contact input[type=submit] {
    background-color: #4CAF50;
    color: white;
    padding: 12px 20px;
    border: none;
    border-radius: 4px;
    cursor: pointer;
}

.contact input[type=submit]:hover {
    background-color: #45a049;
}
	</style>
</head>
<body>

<h1> Contacter l'administrateur</h1>
<div class="contact">
<form method="POST" action="contact.php">
Nom: <input type="text" name="nom" placeholder="Votre nom"><br>
Prenom: <input type="text" name="prenom" placeholder="Votre prenom"><br>
email: <input type="email" name="mail" placeholder="Votre mail"><br>
Message :<textarea cols="30" rows="15" name="message"> Votre message</textarea><br>
<input type="submit" value="envoyer">
</form>
</div>
<?php if(isset($message)){echo $message;} ?>
<?php require "footer.php" ?>

</body>
</html>